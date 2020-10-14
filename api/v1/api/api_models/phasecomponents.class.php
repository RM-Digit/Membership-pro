<?php
	class l6ephasecomponents extends APIApp{
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
			$location = new PhaseComponentsQuery();
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
					$new_record = new PhaseComponents();
					$new_record->fromArray($args);
					if (!$new_record->getProjectId() || !$new_record->getPhaseId() || !$new_record->getName()){
						$this->error_response = 'Missing Required Fields';
						$this->error_status = 406;
						return;
					}
					$new_record->save();
					$this->response = $new_record->toArray();
					break;
				case 'update':
					$vals = $args['vals'];
					$filters = $this->formatFilters('PhaseComponents', $args['filters']);
					$q = PhaseComponentsQuery::create();
					if ($filters){
						$q = $this->runFilterExpressions($q, $filters);
					}
					if ($q->count() < 1){
						$this->error_response = 'Not Found';
						$this->error_status = 404;
						return;
					}

					$coll = $q->find();
					$coll_data = $coll->getFirst();
					if ($vals['Status'] !== $coll_data->getStatus() && ($vals['Status'] == 'complete' || $vals['Status'] == 'graded')){
						$new_record = new ActionTracking();
						$new_record->setTableModified('phasecomponents');
						$new_record->setProjectId($coll_data->getProjectId());
						$new_record->setRecordId($coll_data->getId());
						$new_record->setFieldLabel('Status');
						$new_record->setOldValue($coll_data->getStatus());
						$new_record->setNewValue($vals['Status']);
						$new_record->setClientId($this->client_id);
						$new_record->setUserId($this->user_data['Id']);
						$new_record->setIcon('fa fa-puzzle-piece');
						$new_record->setCaption('The '.$coll_data->getName().' has been '.(($vals['Status'] == 'complete') ? 'completed' : 'graded'));
						$new_record->save();
					}
					$q->update($vals, null, true);
					$q->update(['LastUpdated'=>date('Y-m-d H:i:s')]);

					if (!$q){
						$this->error_response = 'Bad Request';
						$this->error_status = 400;
					}
					$this->response = $q->count();
					break;
				case 'get':
					$columns = $args['cols'];
					$filters = $this->formatFilters('PhaseComponents', $args['filters']);
					$q = PhaseComponentsQuery::create();
					if ($filters){
						$q = $this->runFilterExpressions($q, $filters);
					}
					if ($columns){
						$q->select($columns);
					}
					$q->join('ProjectPhases');
					$q->withColumn('ProjectPhases.Name','PhaseName');
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
					$filters = $this->formatFilters('PhaseComponents', $args['filters']);
					$q = PhaseComponentsQuery::create();
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
