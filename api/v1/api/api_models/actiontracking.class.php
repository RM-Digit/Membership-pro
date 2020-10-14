<?php
	class l6eactiontracking extends APIApp{
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
			$location = new ActionTrackingQuery();
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
					$new_record = new ActionTracking();
					$new_record->fromArray($args);
					if (!$new_record->getUserId() || !$new_record->getTableModified() || !$new_record->getFieldLabel() || !$new_record->getRecordId() || !$new_record->getOldValue() || !$new_record->getNewValue()){
						$this->error_response = 'Missing Required Fields';
						$this->error_status = 406;
						return;
					}
					$new_record->save();
					$this->response = $new_record->toArray();
					break;
				case 'update':
					$vals = $args['vals'];
					$filters = $this->formatFilters('ActionTracking', $args['filters']);
					$q = ActionTrackingQuery::create();
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
					$filters = $this->formatFilters('ActionTracking', $args['filters']);
					$q = ActionTrackingQuery::create();
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
						echo print_r($q->getSelect(), true);
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
						$resp_obj = array();
						if (!$columns){
							$resp_obj = $resp->toArray();
						}else{
							$resp_obj = $resp;
						}

						// $v = new ProjectsQuery();
						// $p_data = $v->findPk($resp_obj['ProjectId']);
						// $resp_obj['ProjectName'] = $p_data->getName();

						$r[] = $resp_obj;
					}
					$this->response = $r;
					break;
				case 'delete':
					$filters = $this->formatFilters('ActionTracking', $args['filters']);
					$q = ActionTrackingQuery::create();
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
