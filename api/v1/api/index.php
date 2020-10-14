<?php

	if(isset($_SERVER['HTTP_X_DVLPMT'])){
		ini_set("error_log", getcwd() . "/php-error.log");
		error_reporting(1);
		ini_set('display_errors', 1);
	}

	if( !function_exists('apache_request_headers') ) {
		function apache_request_headers() {
		  $arh = array();
		  $rx_http = '/\AHTTP_/';
		  foreach($_SERVER as $key => $val) {
		    if( preg_match($rx_http, $key) ) {
		      $arh_key = preg_replace($rx_http, '', $key);
		      $rx_matches = array();
		      $rx_matches = explode('_', $arh_key);
		      if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
		        foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst(strtolower($ak_val));
		        $arh_key = implode('-', $rx_matches);
		      }
		      $arh[$arh_key] = $val;
		    }
		  }
		  return( $arh );
		}
	}

	require_once "../vendor/autoload.php";

	header("Content-Type: application/json");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Authorization');
	header('Access-Control-Allow-Methods: *');

	// error_reporting(E_ERROR & ~E_NOTICE);
	// ini_set("log_errors", 1);
	// ini_set("error_log", "/home/public_html/api/L6E/l6e_backend/api/php-errors.log");
	// ini_set("display_errors",1);

	if(isset($_SERVER['HTTP_X_DVLPMT'])){
		error_reporting(E_ERROR & ~E_NOTICE);
		ini_set("log_errors", 1);
		ini_set("display_errors", 1);		
	}

	require_once "api_app.class.php";
	require_once '../generated-conf/config.php';

	if(isset($_GET['subscription_webhook']) && $_GET['subscription_webhook'] == 1){
		require_once 'webhooks/SubscriptionWebhookListener.php';
		$data = json_decode(file_get_contents('php://input'), true);
		$Webhook = new SubscriptionWebhookListener($data);
		exit;
	}

	try{
		$API = new APIApp($_REQUEST['request'],$_SERVER['HTTP_ORIGIN']);
		echo $API->processAPI();
	}catch(Exception $e){
		header("HTTP/1.1 " . 400 . " Bad Request");
		if(isset($_SERVER['HTTP_X_DVLPMT'])){
			header('Content-Type: text/html');
			die(json_encode([
				'message' => $e->getMessage(),
				'trace' => $e->getTrace()
			]));
		}
		echo json_encode(Array("error"=>$e->getMessage()));
		die();
	}

?>
