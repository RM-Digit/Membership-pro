<?php

class SubscriptionWebhookListener
{

	private $secret = 'Hyrn51NHGWjEX6Vj6GaOq9sIiOzUqd2sKZ8xoG1Uvc2QYLFals769WdSh6N1dQAoBKswh9hkxFtLfHcg72J1hpPslUReGLeq6yzYoOglWBqeOPARYxWPcTzXU1O4HjQWpE4uGs10sbhCW6gwpurUdSORVYMShkfmdbN7hpUc9htiXqtT2XmkN7SyOajo3Fn87r8U0tdcfBNwcIFILzlxYkfYwk23xjVr8TdCgKlKKXyjXzHyZJfcHGPxDdKTsSQP';
	
	private $genericUpdateEvents;


	private $event;
	private $data;

	public function __construct($data)
	{

		$this->genericUpdateEvents = [
			'updatedPassword',
			'updatedProfile',
			'updatedOrder',
			'updatedMembershipLevel'
		];

		// var_dump($data);die();
	
		$this->data = isset($data['data']) ? $data['data'] : [];
		$this->event = isset($data['event']) ? $data['event'] : null;

		$sendSecret = isset($data['webhook_secret']) ? $data['webhook_secret'] : '';

		$this->verifySecret($sendSecret);

		$this->handleEvent();
	
	}

	private function respond($success, $errors)
	{

		echo json_encode(compact('success', 'errors'));
		die();

	}

	private function verifySecret($secret)
	{
		
		if($secret !== $this->secret){
			$this->respond(false, [
				'secret' => 'Secret Fail'
			]);
		}

	}

	private function handleEvent()
	{

		if(!$this->event){
			$this->respond(false, [
				'event' => 'Missing event'
			]);			
		}

		if(in_array($this->event, $this->genericUpdateEvents)){
			
			$this->genericUpdate();
		
			$this->respond(true, []);

		} else {

			$methodName = 'handleEvent_' . $this->event;

			if(method_exists($this, $methodName)){
				try{
					$this->$methodName();
				} catch (\Exception $e) {
					$this->respond(false, [
						'exception' => $e->getMessage()
					]);
				}
				$this->respond(true, []);
			}

			$this->respond(false, [
				'event' => 'Invalid event'
			]);

		}

	}

	private function genericUpdate()
	{

		// Get member data from webhook

		$member = $this->data['user'];

		// Check if user already exists

		$shouldCreateUser = false;
		$shouldUpdateUser = false;

		if(intval($member['id'])){
			$user = UsersQuery::create()
				->filterByWordpressId($member['id'])
				->find();
			$client = ClientsQuery::create()
				->filterByWordpressId($member['id'])
				->find();
			if($client->count() < 1){
				$shouldCreateUser = true;
			} else {
				$shouldUpdateUser = true;
			}
			if($user->count() > 0){
				$user = UsersQuery::create()
					->findOneByWordpressId($member['id']);
			}
			if($client->count() > 0){
				$client = ClientsQuery::create()
					->findOneByWordpressId($member['id']);
			}
		} else {
			$shouldCreateUser = false;
			$shouldUpdateUser = false;
		}
		
		if($this->event === 'updatedMembershipLevel' && $shouldCreateUser && !$member['membership']){
			// User does not exist and is probably being deleted in wp
			return;	
		}
		
		if ($shouldCreateUser || $shouldUpdateUser){

			if($shouldCreateUser){
				$client = new Clients();
				$user = new Users();
			}

			$client->fromArray([
				'Name' => $member['billing']['first_name'] . ' ' . $member['billing']['last_name'],
				'EmailAddress' => $member['email'],
				'Phone' => $member['billing']['phone'],
				'PrimaryContact' => $member['billing']['first_name'] . ' ' . $member['billing']['last_name'],
				'Street' => $member['billing']['address'],
				'City' => $member['billing']['city'],
				'State' => $member['billing']['state'],
				'Zip' => $member['billing']['zip'],
				'Country' => $member['billing']['country'],
				'DateTimeCreated' => date('Y-m-d H:i:s'),
				'LastUpdated' => date('Y-m-d H:i:s'),
				'UserId' => NULL, // temporary
				'WordpressId' => $member['id']
			]);
			$client->save();

			$userArgs = [
				'ClientId' => $client->getId(),
				'Status' => 'active',
				'AccessLevelId' => 3, // Will create after
				'EmailAddress' => $member['email'],
				'Password' => $member['password'] ? $member['password'] : '[temp]',
				'FirstName' => $member['billing']['first_name'],
				'LastName' => $member['billing']['last_name'],
				'WorkTitle' => '',
				'ReportsTo' => null,
				'ProfileImageUrl' => '/images/generic-profile.png',
				'Phone' => $member['billing']['phone'],
				'City' => $member['billing']['city'],
				'State' => $member['billing']['state'],
				'Zip' => $member['billing']['zip'],
				'TimeZone' => '-7',
				'IsLoggedIn' => false,
				'LastLogin' => null,
				'CreatedBy' => null,
				'LastUpdated' => date('Y-m-d H:i:s'),
				'DateTimeCreated' => date('Y-m-d H:i:s'),
				'WordpressId' => $member['id']
			];

			$user->fromArray($userArgs);

			$user->save();

			$client->setUserId($user->getId());
			$client->save();

			// dd($user);

			// Create a new membership and cancel previous
			
			$memberships = UsersSubscriptionsQuery::create()
								->filterByUserId($user->getId())
								->filterByStatus('active')
								->find();

			if($memberships->count() > 0){
				foreach($memberships as $membership){
					$membership->setStatus('canceled');
					$membership->save();
				}
			}

			if($member['membership']){
				$membership = new UsersSubscriptions();
				$membership->fromArray([
					'UserId' => $user->getId(),
					'Package' => $member['membership']['slug'],
					'IsTrial' => !(strpos($member['membership']['slug'], '-trial') === false && strpos($member['membership']['slug'], 'trial-') === false),
					'Status' => 'active',
					'DateTimeCreated' => date('Y-m-d H:i:s', intval($member['membership']['starts_at'])),
					'DateTimeExpires' => date('Y-m-d H:i:s', intval($member['membership']['ends_at'])),
					'WordpressId' => $member['membership']['id']
				]);
				$membership->save();
			}

		}

	} // handleEvent_updatedOrder

}
