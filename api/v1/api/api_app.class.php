<?php
	require_once "api.class.php";
	class APIApp extends API{
		public function __construct($request, $origin = null){
			parent::__construct($request);
		}
	}
?>
