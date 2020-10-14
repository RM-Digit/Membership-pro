<?php
	class imageUploadHandler{
		protected $response;
		protected $error_response = false;
		protected $error_status;

		public function __construct($args = null){
			$this->response = $this->handleUpload();
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
		private function handleUpload(){
			$info_file_exts = array("jpg", "jpeg", "gif", "png");
			$info_upload_exts = end(explode(".", $_FILES["file"]["name"]));
			if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($info_upload_exts, $info_file_exts)){
				if ($_FILES["file"]["error"] > 0){
					$this->error_response = $_FILES["file"]["error"];
					$this->error_status = 400;
				}else{
					$ink=explode('.'.$info_upload_exts,$_FILES["file"]["name"]);
					$fnm = str_replace(array(',','.',' '),'_', $ink[0]);
					$time=time();
					$info_new_file_name =$fnm.'_'.$time.'.'.$info_file_exts[0];

					$info_old_file_path="imageUploads/" . $_FILES["file"]["name"];
					$info_new_file_path="imageUploads/" . $info_new_file_name;
					$full_file_path = "https://api.l6elite.com/imageUploads/".$info_new_file_name;

					move_uploaded_file($_FILES["file"]["tmp_name"],"imageUploads/" . $_FILES["file"]["name"]);
					$name=rename($info_old_file_path,$info_new_file_path);
				}
			}else{
				$this->error_response = 'Invalid File';
				$this->error_status = 400;
			}
			return $full_file_path;
		}
	}

	class excelUploadHandler{
		protected $response;
		protected $error_response = false;
		protected $error_status;

		public function __construct($args){
			$this->response = $this->handleUpload();
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
		private function handleUpload(){
			$info_file_exts = array("xls", "xlsx", "csv");
			$info_upload_exts = end(explode(".", $_FILES["file"]["name"]));
			if (($_FILES["file"]["size"] < 5000000) && in_array($info_upload_exts, $info_file_exts)){
				if ($_FILES["file"]["error"] > 0){
					$this->error_response = $_FILES["file"]["error"];
					$this->error_status = 400;
				}else{
					$ink=explode('.'.$info_upload_exts,$_FILES["file"]["name"]);
					$fnm = str_replace(array(',','.',' '),'_', $ink[0]);
					$time=time();
					$info_new_file_name =$fnm.'_'.$time.'.'.$info_file_exts[0];

					$info_old_file_path="fileUploads/" . $_FILES["file"]["name"];
					$info_new_file_path="fileUploads/" . $info_new_file_name;
					$full_file_path = "https://api.l6elite.com/fileUploads/".$info_new_file_name;

					move_uploaded_file($_FILES["file"]["tmp_name"],"fileUploads/" . $_FILES["file"]["name"]);
					$name=rename($info_old_file_path,$info_new_file_path);
				}
			}else{
				$this->error_response = 'Invalid File';
				$this->error_status = 400;
			}
			return $info_new_file_path;
		}
	}
?>
