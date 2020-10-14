<?php
	class l6eusers extends APIApp{
		protected $response;
		protected $error_response = false;
		protected $error_status;

		public function __construct($args){
			parent::__construct($args);
			$tmp = 'handle'.ucfirst(strtolower($this->method));
			$this->$tmp($args);
		}
		
		public function getResponse(){
			return $this->response;
		}
		public function hasError(){
			return (($this->error_response === false) ? false : true);
		}
		public function getErrorResponse(){
			return $this->error_response;
		}
		public function getErrorStatus(){
			return $this->error_status;
		}

		private function handleGet($args) {
			$record = new UsersQuery();
			$dataout = $record->findPks($args);
			if (!$dataout){
				$this->error_response = 'Not Found';
				$this->error_status = 404;
			}else{
				$dataout = $dataout->toArray();
			}
			$this->response = $dataout;
		}
		private function handlePost($args){
			if (array_key_exists('filters', $args)){
				if (array_key_exists('c',$args['filters'])){
					$temp = $args['filters'];
					$args['filters'] = array();
					$args['filters'][] = $temp;
					$args['filters'][] = array("andor"=>"and");
					$args['filters'][] = array("c"=>"ClientId","op"=>"is","v"=>$this->client_id);
				}else{
					if (count($args['filters']) > 2){
						$args['filters'][] = array("andorsplit"=>"and");
					}else{
						$args['filters'][] = array("andor"=>"and");
					}
					$args['filters'][] = array("c"=>"ClientId","op"=>"is","v"=>$this->client_id);
				}
			}else{
				if ($this->post_action != 'add'){
					$args['filters'] = array("c"=>"ClientId","op"=>"is","v"=>$this->client_id);
				}
			}
			switch ($this->post_action){
				case 'add':
					$new_record = new Users();
					$addUserArgs = $args;
					$addUserArgs['Password'] = (new \Illuminate\Hashing\BcryptHasher())->make($addUserArgs['Password']);
					$new_record->fromArray($addUserArgs);
					$new_record->setClientId($this->client_id);
					$new_record->setCreatedBy($this->id);
					if (!$new_record->getAccessLevelId()){
						// $new_record->setAccessLevelId(1);
						$new_record->setStatus('pending');
					}
					if ($new_record->getStatus() !== 'pending' && Users::getIsUserLimitReached($this->client_id)){
						$this->error_response = 'Could not add the user. You have reached the maximum number of users.';
						$this->error_status = 400;
						return;
					}
					if(!$new_record->getProfileImageUrl()){
						$new_record->setProfileImageUrl('images/generic-profile.png');
					}
					if (!$new_record->getEmailAddress()){
						$this->error_response = 'Missing Required Fields';
						$this->error_status = 406;
						return;
					}
					$q = UsersQuery::create()
						->filterByEmailAddress($new_record->getEmailAddress())
						->find();
					if ($q->count() > 0){
						$this->error_response = 'A User With That Email Address Already Exists!';
						$this->error_status = 400;
						return;
					}
					$new_record->save();
					$resp = $new_record->toArray();
					unset($resp['Password']);
					$this->response = $resp;
					break;
				case 'update':
					$vals = $args['vals'];
					if(isset($vals['IsSuperAdmin'])){
						unset($vals['IsSuperAdmin']);
					}
					if(isset($vals['MaxNumberOfUsers'])){
						unset($vals['MaxNumberOfUsers']);
					}
					$oldUser = UsersQuery::create()->findPk($vals['Id']);
					if(!$oldUser){
						$this->error_response = 'Unable To Find User!';
						$this->error_status = 400;
						return;
					}
					if( $vals['Status'] != 'pending' && $oldUser->getStatus() === 'pending' ){
						if (Users::getIsUserLimitReached($this->client_id)){
							$this->error_response = 'Could not add the user. You have reached the maximum number of users.';
							$this->error_status = 400;
							return;
						}
					}
					if ($vals['Password']){
						if ($this->verifyPassword($vals['CurrentPassword'],$this->user_data['Password'])){
							$newPass = $this->hashPassword($vals['Password']);
							$q = new UsersQuery();
							$d = $q->findPk($this->user_data['Id']);
							if (!$d){
								$this->error_response = 'Unable To Find User!';
								$this->error_status = 400;
								return;
							}
							$d->setPassword($newPass);
							$d->save();
							$this->response = 'Password Successfully Updated!';
						}else{
							$this->error_response = 'Password Is Incorrect!';
							$this->error_status = 400;
							return;
						}
					}else{
						if ($vals['EmailAddress'] != $this->user_data['EmailAddress']){
							if ($args['filters'][0]['c'] == 'Id' && $args['filters'][0]['v'] == $this->user_data['Id'] ){
								$q = UsersQuery::create()
									->filterByEmailAddress($vals['EmailAddress']);
								if ($q->count() > 0){
									$this->error_response = 'Email Address Already Exists!';
									$this->error_status = 400;
									return;
								}
							}
						}
						$filters = $this->formatFilters('Users', $args['filters']);
						$q = UsersQuery::create();
						if ($filters){
							$q = $this->runFilterExpressions($q, $filters);
						}
						$q->find();
						if ($q->count() < 1){
							$this->error_response = 'Not Found';
							$this->error_status = 404;
							return;
						}
						$q->update($vals);
						if (!$q){
							$this->error_response = 'Bad Request';
							$this->error_status = 400;
						}
						$this->response = $q->count();
					}
					break;
				case 'get':
					// die(json_encode($args));
					$columns = $args['cols'];
					$filters = $this->formatFilters('Users', $args['filters']);
					$q = UsersQuery::create();
					if ($filters){
						$q = $this->runFilterExpressions($q, $filters);
					}
					if ($columns){
						$q->select($columns);
					}
                                        /*else{
                                                $q->select("*");
						$columns = $q->getSelect();
						foreach($columns as $k => $column)
						{
							$columns[$k] = preg_replace("/[a-zA-Z]+\./", "", $column);
						}
						$q->select($columns);
                                        }*/
					$q->find();

					if ($q->count() < 1){
						$this->error_response = 'Not Found';
						$this->error_status = 404;
						return;
					}

					if ($args['count_only']){
						$this->response = $q->count();
						return;
					}

					$r = [];
					foreach ($q AS $resp){
						if (!$columns){
							$d = $resp->toArray();
							unset($d['Password']);
							$r[] = $d;
						}else{
							unset($resp['Password']);
							$r[] = $resp;
						}
					}
					$r = Users::injectIsSuperAdmin($r);
					$r = Users::injectMaxNumberOfUsers($r);
					$this->response = $r;
					break;
				case 'delete':
					$filters = $this->formatFilters('Users', $args['filters']);
					$q = UsersQuery::create();
					if ($filters){
						$q = $this->runFilterExpressions($q, $filters);
					}
					$q->find();
					if ($q->count() < 1){
						$this->error_response = 'Not Found';
						$this->error_status = 404;
						return;
					}
					$q->delete();
					if (!$q){
						$this->error_response = 'Bad Request';
						$this->error_status = 400;
					}
					$this->response = $q;
					break;
				default:
					$this->error_response = 'Action Not Available';
					$this->error_status = 404;
			}
		}
	}
?>
