<?php
	class l6eprojects extends APIApp{
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
			$location = new ProjectsQuery();
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

					$this->current_user_middleware('Create Projects');

					$new_record = new Projects();
					$new_record->fromArray($args);
					$new_record->setCreatedBy($this->user_data['Id']);
					$new_record->setClientId($this->user_data['ClientId']);
					$new_record->save();
					$this->response = $new_record->toArray();

					//Action Tracking
					$new_action = new ActionTracking();
					$new_action->setTableModified('projects');
					$new_action->setClientId($this->client_id);
					$new_action->setProjectId($new_record->getId());
					$new_action->setRecordId($new_record->getId());
					$new_action->setCaption('A new project was born! '.$new_record->getScope());
					$new_action->setIcon('fa fa-child');
					$new_action->setUserId($this->user_data['Id']);
					$new_action->save();

					break;
				case 'update':

					$this->current_user_middleware('Edit Existing Projects');

					$vals = $args['vals'];
					$filters = $this->formatFilters('Projects', $args['filters']);
					$q = ProjectsQuery::create();
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
					if ($vals['Scope'] !== $coll_data->getScope()){
						$new_record = new ActionTracking();
						$new_record->setTableModified('projects');
						$new_record->setProjectId($coll_data->getId());
						$new_record->setRecordId($coll_data->getId());
						$new_record->setFieldLabel('Scope');
						$new_record->setOldValue($coll_data->getScope());
						$new_record->setNewValue($vals['Scope']);
						$new_record->setClientId($this->client_id);
						$new_record->setUserId($this->user_data['Id']);
						$new_record->setIcon('fa fa-code');
						$new_record->setCaption('Scope has changed to: '.$vals['Scope']);
						$new_record->save();
					}
					$q->update($vals);
					$q->update(['LastUpdated'=>date('Y-m-d H:i:s')]);

					$charterQuery = PhaseComponentsQuery::create()->filterByProjectId($coll_data->getId())->filterByName('Charter');
					if($charterQuery->find()->count()){
						$charter = $charterQuery->find()->getFirst();
						$charter->setLastUpdated(date('Y-m-d H:i:s'));
						$charter->save();
					}

					if (!$q){
						$this->error_response = 'Bad Request';
						$this->error_status = 400;
						return;
					}
					$this->response = $q->count();
					break;
				case 'get':
					$columns = $args['cols'];
					$filters = $this->formatFilters('Projects', $args['filters']);
					$q = ProjectsQuery::create();
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
							$resp_obj = $resp->toArray();
						}else{
							$resp_obj = $resp;
						}
						//Inject Completion Percentage
						$resp_obj['CompletionPercentage'] = 0;
						$working_count = 0;
						$phase_components = PhaseComponentsQuery::create();
						$phase_components->filterByProjectId($resp->getId());
						$phase_components->join('ProjectPhases');
						$phase_components->withColumn('ProjectPhases.Name','PhaseName');
						$phase_components->find();
						if ($phase_components->count() > 0){
							foreach ($phase_components AS $pc){
								if ($pc->getStatus() == 'working'){
									$working_count++;
								}
								$resp_obj['PhaseData'][] = $pc->toArray();
							}
							$resp_obj['CompletionPercentage'] = (($phase_components->count() - $working_count)/$phase_components->count()) * 100;
						}
						$r[] = $resp_obj;
					}
					$this->response = $r;
					break;
				case 'delete':
					$this->current_user_middleware('Edit Existing Projects');
					$filters = $this->formatFilters('Projects', $args['filters']);
					$q = ProjectsQuery::create();
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
