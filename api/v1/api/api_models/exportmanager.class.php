<?php
	class exportHandler extends APIApp{
		protected $response;
		protected $error_response = false;
		protected $error_status;

		public function __construct($args){
			$this->response = $this->handleExport($args);
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
		private function handleExport($args){
			if (!$args['data_type']){
				$this->error_response = 'Invalid Request';
				$this->error_status = 400;
				return;
			}

			$filters = $this->formatFilters($args['data_type'], $args['filters']);
			$query_table = $args['data_type'].'Query';
			$q = $query_table::create();
			if ($filters){
				$q = $this->runFilterExpressions($q, $filters);
			}
			$results = $q->find()->toArray();



			//Create PHP Excel Instance
			include 'phpexcel/Classes/PHPExcel.php';
			include 'phpexcel/Classes/PHPExcel/Writer/Excel2007.php';
			$objPHPExcel = new PHPExcel();
			$objWorksheet = $objPHPExcel->getSheet(0);
			$alphabet_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
			//Loop Through Data And Put Into Sheet
			$head_row = array();
			$row = 1;
			if ($results){
				foreach ($results as $x=>$res){
					if ($args['data_type'] == 'DefineRaci'){
						if ($row == 1){
							$objWorksheet->setCellValue('A1','Activity');
							$owners = json_decode($res['Owners']);
							$col = 1;
							foreach ($owners as $o){
								$objWorksheet->setCellValue($alphabet_array[$col].$row,$o);
								$col++;
							}
							$row++;
						}
						$col_count = 1;
						$objWorksheet->setCellValue('A'.$row,$res['Activity']);
						$raci = json_decode($res['Raci']);
						foreach ($raci as $o){
							$objWorksheet->setCellValue($alphabet_array[$col_count].$row,$o);
							$col_count++;
						}
					}else{
						$head_row = array_keys($res);
						$col_count = 0;
						if ($row == 1){
							foreach($head_row as $k=>$rval){
								if ($rval != 'Id' && $rval != 'ProjectId' && $rval != 'PhaseId' && $rval != 'PhaseComponentId'){
									$objWorksheet->setCellValue($alphabet_array[$col_count].$row,$rval);
									$col_count++;
								}
							}
							$row++;
						}
						$col_count = 0;
						foreach ($res AS $col=>$val){
							if ($col != 'Id' && $col != 'ProjectId' && $col != 'PhaseId' && $col != 'PhaseComponentId'){
								$objWorksheet->setCellValue($alphabet_array[$col_count].$row, $val);
								$col_count++;
							}
						}
					}
					$row++;
				}
			}

			//Create The Excel File And Return The File Path
			$ftime = time();
			$file_path = "excelExports/".$args['data_type'].$ftime.$this->client_id.'.xlsx';
			$full_file_path = "https://api.l6elite.com/excelExports/".$args['data_type'].$ftime.$this->client_id.'.xlsx';
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$objWriter->save($file_path);

			return $full_file_path;
		}
	}
?>
