<?php
	class l6echartexceldata extends APIApp{
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
			$location = new ChartExcelDataQuery();
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
					$new_record = new ChartExcelData();
					$new_record->fromArray($args);
					if (!$new_record->getProjectId() || !$new_record->getPhaseId() || !$new_record->getPhaseComponentId()){
						$this->error_response = 'Missing Required Fields';
						$this->error_status = 406;
						return;
					}
					$new_record->save();
					$this->response = $new_record->toArray();
					break;
				case 'update':
					$vals = $args['vals'];
					$filters = $this->formatFilters('ChartExcelData', $args['filters']);
					$q = ChartExcelDataQuery::create();
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
					$filters = $this->formatFilters('ChartExcelData', $args['filters']);
					$q = ChartExcelDataQuery::create();
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
						$resp_obj = [];
						if (!$columns){
							$resp_obj = $resp->toArray();
						}else{
							$resp_obj = $resp;
						}
						$resp_obj['ExcelFileData'] = $this->getExcelData($resp_obj['DataUrl']);
						$r[] = $resp_obj;
					}
					$this->response = $r;
					break;
				case 'delete':
					$filters = $this->formatFilters('ChartExcelData', $args['filters']);
					$q = ChartExcelDataQuery::create();
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
				case 'upload':
					//Handle Upload
					require_once "uploadmanager.class.php";
					$resp = new excelUploadHandler();

					$q = ChartExcelDataQuery::create()
					  ->filterByProjectId($args['ProjectId'])
					  ->filterByPhaseId($args['PhaseId'])
					  ->filterByPhaseComponentId($args['PhaseComponentId']);
					if ($q->count() > 0){
						$rec = $q->find()->getFirst();
						$rec->setDataUrl($resp->getResponse());
						$rec->save();
					}else{
						$rec = new ChartExcelData();
						$rec->setProjectId($args['ProjectId']);
						$rec->setPhaseId($args['PhaseId']);
						$rec->setPhaseComponentId($args['PhaseComponentId']);
						$rec->setDataUrl($resp->getResponse());
						$rec->save();
					}

					$resp_obj = $rec->toArray();
					$resp_obj['ExcelFileData'] = $this->getExcelData($resp->getResponse());

					$this->response = $resp_obj;
					break;
				default:
					$this->error_response = 'Action Not Available';
					$this->error_status = 404;
			}
		}
		private function getExcelData($file){
			include 'phpexcel/Classes/PHPExcel.php';
			include 'phpexcel/Classes/PHPExcel/Writer/Excel2007.php';
			//Load The File
			$inputFileName = $file;
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);

			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(true);
			$objPHPExcel = $objReader->load($inputFileName);

			//Get The First Sheet
			$objWorksheet = $objPHPExcel->getSheet(0);
			$allDataInSheet = $objWorksheet->toArray(null,true,true,true);

			return $allDataInSheet;
		}
	}
?>
