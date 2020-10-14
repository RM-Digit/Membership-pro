<?php
	class l6eaccesslevels extends APIApp{
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
			$location = new AccessLevelsQuery();
			$dataout = $location->findPks($args);
			if (!$dataout){
				$this->error_response = 'Not Found';
				$this->error_status = 404;
			}else{
				$dataout = $dataout->toArray();
			}
			$this->response = $dataout;
		}
		private function handlePost($args){
			//Force Filter Of Client Id
			if (array_key_exists('filters', $args) && is_array($args['filters'])){
				array_push($args['filters'],array("andor"=>"and"));
				array_push($args['filters'],array("c"=>"ClientId","op"=>"is","v"=>$this->client_id));
				array_push($args['filters'],array("andorsplit"=>"or"));
				array_push($args['filters'],array("c"=>"ClientId","op"=>"isempty"));
			}else{
				if ($this->post_action != 'add'){
					$args['filters'] = array(
						array("c"=>"ClientId","op"=>"is","v"=>$this->client_id),
						array("andor"=>"or"),
						array("c"=>"ClientId","op"=>"isempty","v"=>true)
					);
				}
			}
			switch ($this->post_action){
				case 'add':
					$new_record = new AccessLevels();
					$new_record->fromArray($args);
					if (!$new_record->getName()){
						$this->error_response = 'Missing Required Fields';
						$this->error_status = 406;
						return;
					}
					$new_record->setClientId($this->client_id);
					$new_record->setDateTimeCreated(date('Y-m-d H:i:s'));
					$new_record->setLastUpdated(date('Y-m-d H:i:s'));
					$new_record->save();
					$this->response = $new_record->toArray();
					break;
				case 'update':
					$vals = $args['vals'];
					$filters = $this->formatFilters('AccessLevels', $args['filters']);
					$q = AccessLevelsQuery::create();
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
					break;
				case 'get':
					$columns = $args['cols'];
					$filters = $this->formatFilters('AccessLevels', $args['filters']);
					// $this->error_response = $filters;
					// 	$this->error_status = 400;
					// return;
					$q = AccessLevelsQuery::create();
					if ($filters){
						$q = $this->runFilterExpressions($q, $filters);
					}

					if ($columns){
						$q->select($columns);
					}
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
						$resp_obj = array();
						if (!$columns){
							$resp_obj= $resp->toArray();
						}else{
							$resp_obj = $resp;
						}
						//Inject Additional Data
						$access_level_details = AccessLevelDetailsQuery::create()
							->filterByAccessLevelId($resp->getId())
							->join('AccessLevelOptions')
							->withColumn('AccessLevelOptions.Id','AccessLevelOptionId')
							->withColumn('AccessLevelOptions.Name','AccessLevelOptionName')
							->withColumn('AccessLevelOptions.Package','AccessLevelOptionPackage')
							->find();
						if ($access_level_details->count() > 0){
							foreach($access_level_details AS $ad){
								$resp_obj['Details'][] = $ad->toArray();
							}
						}
						$r[] = $resp_obj;
					}
					$this->response = $r;
					break;
				case 'delete':
					$filters = $this->formatFilters('AccessLevels', $args['filters']);
					$q = AccessLevelsQuery::create();
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
