<?php
	class l6eclients extends APIApp{
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
			$location = new ClientsQuery();
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
			switch ($this->post_action){
				case 'add':
					$new_record = new Clients();
					$new_record->fromArray($args);
					if (!$new_record->getEmailAddress() || !$new_record->getName()){
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
					$filters = $this->formatFilters('Clients', $args['filters']);
					$q = ClientsQuery::create();
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
					$filters = $this->formatFilters('Clients', $args['filters']);
					$q = ClientsQuery::create();
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
					$filters = $this->formatFilters('Clients', $args['filters']);
					$q = ClientsQuery::create();
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
