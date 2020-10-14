<?php
	class l6eaccessleveloptions extends APIApp{
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
			if ($args){
				$location = new AccessLevelOptionsQuery();
				$dataout = $location->findPks($args);
			}else{
				$dataout = AccessLevelOptionsQuery::create()
					->filterByClientId(array('IS NULL',$this->client_id))
					->find();
			}
			if (!$dataout){
				$this->error_response = 'Not Found';
				$this->error_status = 404;
			}else{
				$dataout = $dataout->toArray();
				foreach ($dataout as $k=>$d){
					if ($d['ClientId'] != $this->client_id && $d['ClientId'] != null){
						unset($d[$k]);
					}
				}
			}
			$this->response = $dataout;
		}
		private function handlePost($args){
			switch ($this->post_action){
				case 'add':
					$new_record = new AccessLevelOptions();
					$new_record->fromArray($args);
					if (!$new_record->getName() || !$new_record->getPackage()){
						$this->error_response = 'Missing Required Fields';
						$this->error_status = 406;
						return;
					}
					$new_record->setPassword(md5($new_record->getPassword));
					$new_record->save();
					$this->response = $new_record->toArray();
					break;
				case 'update':
					$vals = $args['vals'];
					$filters = $this->formatFilters('AccessLevelOptions', $args['filters']);
					$q = AccessLevelOptionsQuery::create();
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
					if (array_key_exists('filters', $args)){
						array_push($args['filters'],array("andor"=>"and"));
						array_push($args['filters'],array("c"=>"ClientId","op"=>"anyof","v"=>array($this->client_id,null)));
					}else{
						array_push($args['filters'],array("c"=>"ClientId","op"=>"anyof","v"=>array($this->client_id,null)));
					}
					$filters = $this->formatFilters('AccessLevelOptions', $args['filters']);
					$q = AccessLevelOptionsQuery::create();
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
						if (!$columns){
							$r[] = $resp->toArray();
						}else{
							$r[] = $resp;
						}
					}
					$this->response = $r;
					break;
				case 'delete':
					$filters = $this->formatFilters('AccessLevelOptions', $args['filters']);
					$q = AccessLevelOptionsQuery::create();
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
