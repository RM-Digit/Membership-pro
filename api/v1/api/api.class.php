<?php require_once('../../../wp-load.php'); ?>
<?php
	abstract class API{
		protected $method = '';
		protected $endpoint = '';
		protected $customer_account_hash = '';
		protected $args = array();
		protected $file = null;
		protected $request = array();
		protected $response_data = array();
		protected $response_status = null;
		protected $post_action = '';
		protected $user_data = array();
		protected $client_id = 0;

		public function __construct($request){

			// $headers = apache_request_headers();
			// echo json_encode($headers);
			// die();
			// if(isset($_SERVER['HTTP_AUTHORIZATION'])){
			// 	die($_SERVER['HTTP_AUTHORIZATION']);
			// } else {
			// 	die('asd');
			// }

			$this->args = explode('/', rtrim($request, '/'));

			$this->endpoint = array_shift($this->args);

			if (count($this->args) == 1){
				$this->args = $this->args[0];
			}

			$this->method = $_SERVER['REQUEST_METHOD'];
			if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)){
				if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE'){
					$this->method = 'DELETE';
				}else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT'){
					$this->method = 'PUT';
				}else{
					throw new Exception("Unexpected Header");
				}
			}

			switch ($this->method){
				case 'OPTIONS':
					break;
				case 'POST':
					$post_data_content = file_get_contents('php://input');
					$post_data = json_decode($post_data_content, true);

					if ($this->endpoint == 'login'){
						$pass = $post_data['password'];
						$email = $post_data['email'];
						header('Authorization: Basic ' . base64_encode($email.':'.$pass));
						$q = $this->verifyLogin($email,$pass);
						$q[0]->setIsLoggedIn(1);
						$q[0]->setLastLogin(Date('Y-m-d H:i:s'));
						$q[0]->save();
						$resp = $q[0]->toArray();
						try{
							$q = AccessLevelDetailsQuery::create()
								->select(array('AccessLevelOptions.Name'))
								->join('AccessLevelDetails.AccessLevelOptions')
								->where('AccessLevelDetails.AccessLevelId = ?',$resp['AccessLevelId'])
								->find();
							if ($q->count() > 0){
								$resp['AccessLevelDetail'] = $q->toArray();
							}
						} catch (Exception $e){}
						unset($resp['Password']);

						echo $this->_response($resp);
						exit;
					}else if ($this->endpoint == 'contactus'){
						//To Admin
						$emailtitle = 'L6Elite - New Contact Request!';
						$text1 = 'You have a new contact request! The details are below:<br/><br/>Name/Company: '.$_POST['name'].'<br/>Email: '.$_POST['email'].'<br/>Phone: '.$_POST['phone'].'<br/>Message: '.$_POST['message'];
						$button1text = '';
						$button1link = '';
						$image1 = '';
						$text2 = '';
						$button2text = '';
						$button2link = '';
						$footertext = 'At Wallace &amp; Associates we do our best to ensure the confidentiality of our customer&rsquo;s information. If for any reason this email was not intended for you, please delete it immediately.';

						$message = $this->createEmail($emailtitle,$text1,$button1text,$button1link,$image1,$text2,$button2text,$button2link,$footertext);
						$this->sendEmail('support@l6elite.com', 'support@l6elite.com', '', $emailtitle, $message);

						//To Client
						$emailtitle = 'L6Elite - Thank You For Reaching Out!';
						$text1 = 'Hello,<br/><br/>We appreciate you reaching out to us! We wanted to let you know that we have received your message and will be in touch with you shortly!<br/><br/>Thank you,<br/><br/><br/>L6 Elite Admin Team<br/>info@l6elite.com<br/><a href="http://l6elite.com">l6elite.com</a>';
						$button1text = '';
						$button1link = '';
						$image1 = '';
						$text2 = '';
						$button2text = '';
						$button2link = '';
						$footertext = 'At L6 Elite we do our best to ensure the confidentiality of our customer&rsquo;s information. If for any reason this email was not intended for you, please delete it immediately.';

						$message = $this->createEmail($emailtitle,$text1,$button1text,$button1link,$image1,$text2,$button2text,$button2link,$footertext);
						$this->sendEmail($_POST['email'], 'info@l6elite.com', '', $emailtitle, $message);
						echo $this->_response('Contact Information Received!');
						exit;
					}else if ($this->endpoint == 'newslettersignup'){
						//To Admin
						$emailtitle = 'L6Elite - New Newsletter Sign-Up!';
						$text1 = 'Someone new has signed up for the newsletter! The details are below:<br/><br/>Email: '.$_POST['email'];
						$button1text = '';
						$button1link = '';
						$image1 = '';
						$text2 = '';
						$button2text = '';
						$button2link = '';
						$footertext = 'At L6 Elite we do our best to ensure the confidentiality of our customer&rsquo;s information. If for any reason this email was not intended for you, please delete it immediately.';

						$message = $this->createEmail($emailtitle,$text1,$button1text,$button1link,$image1,$text2,$button2text,$button2link,$footertext);
						$this->sendEmail('support@l6elite.com', 'support@l6elite.com', '', $emailtitle, $message);

						//To Client
						$emailtitle = 'L6Elite - Newsletter Subscription!';
						$text1 = 'Hello,<br/><br/>We appreciate you subscribing to our newsletter! We will send you some periodic emails with great information about optimizing your workflow with Lean Six Sigma in your organization.<br/><br/>Thank you,<br/><br/><br/>L6 Elite Admin Team<br/>info@l6elite.com<br/><a href="http://l6elite.com">l6elite.com</a>';
						$button1text = '';
						$button1link = '';
						$image1 = '';
						$text2 = '';
						$button2text = '';
						$button2link = '';
						$footertext = 'At L6 Elite we do our best to ensure the confidentiality of our customer&rsquo;s information. If for any reason this email was not intended for you, please delete it immediately.';

						$message = $this->createEmail($emailtitle,$text1,$button1text,$button1link,$image1,$text2,$button2text,$button2link,$footertext);
						$this->sendEmail($_POST['email'], 'info@l6elite.com', '', $emailtitle, $message);
						echo $this->_response('Contact Information Received!');
						exit;
					}else if ($this->endpoint == 'imageupload'){
						require_once "api_models/uploadmanager.class.php";
						$resp = new imageUploadHandler();
						echo $this->_response($resp->getResponse());
						exit;
					}else if ($this->endpoint == 'exportdata'){
						//Verify User Authorization Headers And Verify Login
						$request_headers = apache_request_headers();
						if (!$request_headers['Authorization']){
							echo $this->_response('No Authorization',401);
							exit;
						}
						$q = $this->verifyLogin($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);
						$this->user_data = $q[0]->toArray();
						$this->client_id = $q[0]->getClientId();

						if (!$post_data){
							$post_data = $_POST;
						}

						require_once "api_models/exportmanager.class.php";
						$resp = new exportHandler($post_data);

						if ($resp->hasError()){
							echo $this->_response($resp->getErrorResponse(),401);
							exit;
						}

						echo $this->_response($resp->getResponse(), 200);
						exit;
					}else if ($this->endpoint == 'passwordreset'){
						$ran1 = rand(5,150);
						$ran2 = rand(200,3600);
						$ran3 = rand(6998,8555);
						$pass = md5(($ran1+$ran2+$ran3)/$ran2);
						$pass = substr($pass,0,9);
						$ran1 = rand(1,4);
						$ran2 = rand(5,6);
						$ran3 = rand(7,9);
						$pass = substr($pass,0,$ran1-1).strtoupper(substr($pass,$ran1,$ran1)).substr($pass,$ran1,$ran2-1).strtoupper(substr($pass,$ran2,$ran2)).substr($pass,$ran2,$ran3-1).strtoupper(substr($pass,$ran3,$ran3)).substr($pass,$ran3);
						$ranlen = rand(5,8);
						$pass = substr($pass,0,$ranlen);

						$user_to_change = null;
						$q = UsersQuery::create()
							->filterByEmailAddress($post_data['EmailAddress'])
							->find();
						if ($q->count() < 1){
							echo $this->_response('Unable To Find User Profile!',400);
							exit;
						}
						$user_to_change = $q[0];
						$user_to_change->setPassword($this->hashPassword($pass));

						$emailtitle = 'L6Elite - A Fresh New Password!';
						$text1 = 'Your password has been reset! You can change it in your profile after logging in.
						<br><br>Temporary Password: '.$pass;
						$button1text = 'Login Now!';
						$button1link = 'https://l6elite.com';
						$image1 = '';
						$text2 = '';
						$button2text = '';
						$button2link = '';
						$footertext = 'At L6 Elite we do our best to ensure the confidentiality of our customer&rsquo;s information. If for any reason this email was not intended for you, please delete it immediately.';

						$message = $this->createEmail($emailtitle,$text1,$button1text,$button1link,$image1,$text2,$button2text,$button2link,$footertext);
						$this->sendEmail($user_to_change->getEmailAddress(), 'support@l6elite.com', '', $emailtitle, $message);
						$user_to_change->save();
						echo $this->_response('Success!');
						exit;
					}else{
						//Verify User Authorization Headers And Verify Login
						$request_headers = apache_request_headers();
						if (!$request_headers['Authorization']){
							echo $this->_response('No Authorization',401);
							exit;
						}

						$q = $this->verifyLogin($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);

						$this->user_data = $q[0]->toArray();
						$this->client_id = $q[0]->getClientId();

						if (!$post_data){
							$post_data = $_POST;
						}
						//Handle POST Request
						$tables = (array_key_exists('t', $post_data)) ? $post_data['t'] : ((array_key_exists('T', $post_data)) ? $post_data['T'] : $post_data['tables']);
						$action = (array_key_exists('a', $post_data)) ? $post_data['a'] : ((array_key_exists('A', $post_data)) ? $post_data['A'] : $post_data['action']);
						$cols = (array_key_exists('c', $post_data)) ? $post_data['c'] : ((array_key_exists('C', $post_data)) ? $post_data['C'] : ((array_key_exists('columns', $post_data)) ? $post_data['columns'] : null));
						$filters = (array_key_exists('f', $post_data)) ? $post_data['f'] : ((array_key_exists('F', $post_data)) ? $post_data['F'] : ((array_key_exists('filters', $post_data)) ? $post_data['filters'] : null));
						$vals = (array_key_exists('v', $post_data)) ? $post_data['v'] : ((array_key_exists('V', $post_data)) ? $post_data['V'] : ((array_key_exists('values', $post_data)) ? $post_data['values'] : null));
						$count_only = (array_key_exists('co', $post_data)) ? $post_data['co'] : ((array_key_exists('CO', $post_data)) ? $post_data['CO'] : ((array_key_exists('countonly', $post_data)) ? $post_data['countonly'] : null));

						if (!$tables || !$action){
							echo $this->_response('Missing Parameters',400);
							exit;
						}
						$this->post_action = strtolower($action);
						switch ($this->post_action) {
							case 'upload':
							case 'add':
								foreach ($tables AS $k=>$tbl){
									$this->request[] = array("tbl"=>$tbl,"request_content"=>$vals[$k]);
								}
								break;
							case 'update':
								foreach ($tables AS $k=>$tbl){
									$request_content = array("vals" => $vals[$k], "filters" => $filters[$k]);
									$this->request[] = array("tbl" => $tbl,"request_content" => $request_content);
								}
								break;
							case 'get':
								foreach ($tables AS $k=>$tbl){
									$cur_count_only = ($count_only[$k] == null || $count_only[$k] == 'false') ? false : true;
									$request_content = array("cols" => $cols[$k], "filters" => $filters[$k], "count_only"=>$cur_count_only);
									$this->request[] = array("tbl" => $tbl,"request_content" => $request_content);
								}
								break;
							case 'delete':
								foreach ($tables AS $k=>$tbl){
									$request_content = array("filters" => $filters[$k]);
									$this->request[] = array("tbl"=>$tbl,"request_content"=>$request_content);
								}
								break;
							default:
								echo $this->_response('Invalid Method',405);
								exit;
						}

					}
					break;
				case 'GET':
					$request_headers = apache_request_headers();
					if (!$request_headers['Authorization']){
						echo $this->_response('No Authorization',401);
						exit;
					}

					$q = $this->verifyLogin($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);
					$this->user_data = $q[0]->toArray();
					$this->client_id = $q[0]->getClientId();

					$post_data = $this->_cleanInputs($this->args);
					$this->request[] = array("tbl"=>$this->endpoint,"request_content"=>$post_data);
					break;
				default:
					echo $this->_response('Invalid Method',405);
					exit;
			}
		}

function debug($text){
    $myfile = fopen("debug.txt", "a") or die("Unable to open file!");
    fwrite($myfile, print_r($text, true) . "\n");
    fclose($myfile);
}
		private function createEmail($emailtitle,$text1,$button1text,$button1link,$image1,$text2,$button2text,$button2link,$footertext){
			//$email_ht is the variable within the email file
			include 'email_templates/general.php';
			return $email_ht;
		}

		private function sendEmail($to,$from,$cc,$subject,$message){
			$headers = "From: " . $from . "\r\n";
			$headers .= "CC: " . $cc . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			@mail($to,$subject,$message,$headers);
		}

		public function hashPassword($pass){
			return (new \Illuminate\Hashing\BcryptHasher())->make($pass);
		}

		public function verifyPassword($pass, $hash){
			
			$check = (new \Illuminate\Hashing\BcryptHasher())->check($pass, $hash);
			return $check;
		}

		private function verifyLogin($email, $pass){
			$q = UsersQuery::create()
				->filterByEmailAddress($email)
				->find();
			if ($q->count() < 1){
				echo $this->_response('INVALID_CREDENTIALS',401);
				exit;
			}else{
				
				$q_pass = $q[0]->getPassword();
				// $hash_password=password_hash($password, PASSWORD_DEFAULT);
				
				 $check = wp_check_password_api($pass,$q_pass);
				if (!$check){
					echo $this->_response('INVALID_CREDENTIALS',401);
					exit;
				}

			
			}
			$user = $q[0];
			$client = ClientsQuery::create()->filterById($user->getClientId())->find();
			if($client->count() < 1){
				echo $this->_response('MEMBERSHIP_EXPIRED', 401);
				exit;				
			}
			$client = $client[0];
			$memberships = UsersSubscriptionsQuery::create()
							->filterByUserId($client->getUserId())
							->filterByStatus('active')
							->find();
			if($memberships->count() < 1){
				echo $this->_response('MEMBERSHIP_EXPIRED', 401);
				exit;
			}
			if($user->getStatus() === 'inactive'){
				echo $this->_response('USER_INACTIVE', 401);
				exit;
			}
			return $q;
		}
		public function isAssoc($arr){
			return count(array_filter(array_keys($array), 'is_string')) > 0;
		}
		public function processAPI(){

			foreach ($this->request AS $r){
				$this->endpoint = $r['tbl'];
				if (!file_exists("api_models/".$this->endpoint.".class.php") && count($this->request) == 1){
					return $this->_response("No Endpoint: $this->endpoint",404);
				}elseif(!file_exists("api_models/".$this->endpoint.".class.php")){
					$this->response_data[] = array("No Endpoint: $this->endpoint",404);
				}
				require_once "api_models/".$this->endpoint.".class.php";
				$call_class = 'l6e'.$this->endpoint;
				if (class_exists($call_class)){
					$resp = new $call_class($r['request_content']);
					if ($resp->hasError() == true){
						$this->response_data[] = array($resp->getErrorResponse(), $resp->getErrorStatus());
						$this->response_status = $resp->getErrorStatus();
					}else{
						$this->response_data[] = $resp->getResponse();
					}
				}
			}
			$status = $this->response_status ? $this->response_status : 200;
			if (count($this->response_data) == 1){
				return $this->_response($this->response_data[0], $status);
			}
			return $this->_response($this->response_data, $status);
		}

		protected function get_user_permissions()
		{

			$accessLevels = AccessLevelDetailsQuery::create()->filterByAccessLevelId($this->user_data->AccessLevelId)->find();
			
			if(!$accessLevels || $accessLevels->count() == 0){
				return false;
			}

			$permissionIds = [];

			foreach($accessLevels as $accessLevelDetails){
				$permissionIds[] = $accessLevelDetails->getAccessLevelOptionId();
			}

			$accessOptions = AccessLevelOptionsQuery::create()->filterById($permissionIds)->find();

			$permissions = [];

			foreach($accessOptions as $accessOption){
				$permissions[] = $accessOption->getName();
			}

			return $permissions;

		}

		protected function current_user_can($permission)
		{

			$permissions = $this->get_user_permissions();

			return in_array($permission, $permissions);

		}

		protected function current_user_middleware($permission)
		{
			if($this->current_user_can($permission) === false){
				$this->error_response = 'Access Denied';
				$this->error_status = 401;
				return;						
			}
		}

		private function _response($data, $status = 200){
			header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        	return json_encode($data);
		}

		private function _cleanInputs($data){
			$clean_input = array();
			if (is_array($data)){
				foreach ($data as $k => $v) {
					$clean_input[$k] = $this->_cleanInputs($v);
				}
			}else{
				$clean_input = trim(strip_tags($data));
			}
			return $clean_input;
		}

		private function _requestStatus($code){
			$status = array(
				200 => 'OK',
				201 => 'Created',
				404 => 'Not Found',
				400 => 'Bad Request',
				401 => 'Unauthorized User',
				405 => 'Method Not Allowed',
				406 => 'Not Acceptable',
				500 => 'Internal Server Error'
			);
			return ($status[$code]) ? $status[$code] : $status[500];
		}

		public function formatFilters($table, $filters){
			$conditions = array();

			//Check if multiple filters or just a single. If single then turn it into an array.
			if(array_key_exists('c', $filters) || array_key_exists('col', $filters)){
				$filters = array($filters);
			}

			foreach ($filters AS $f){
				$expression = $this->buildExpression($table, $f);
				if (!$expression){
					//Handle False Expression Here!
					continue;
				}
				//Check for multiple conditions returned. This will occur for the BETWEEN operator
				foreach ($expression as $c) {
					$conditions[] = $c;
				}
			}
			return $conditions;
		}

		private function standardizeFilterParameters($f){
			$return_obj = array();

			if (array_key_exists('join', $f))
				$return_obj['j'] = $f['join'];
			if (array_key_exists('j', $f))
				$return_obj['j'] = $f['j'];
			if (array_key_exists('col', $f))
				$return_obj['c'] = $f['col'];
			if (array_key_exists('column', $f))
				$return_obj['c'] = $f['column'];
			if (array_key_exists('c', $f))
				$return_obj['c'] = $f['c'];
			if (array_key_exists('value', $f))
				$return_obj['v'] = $f['value'];
			if (array_key_exists('val', $f))
				$return_obj['v'] = $f['val'];
			if (array_key_exists('v', $f))
				$return_obj['v'] = $f['v'];
			if (array_key_exists('operator', $f))
				$return_obj['op'] = $f['operator'];
			if (array_key_exists('op', $f))
				$return_obj['op'] = $f['op'];
			if (array_key_exists('limit', $f))
				$return_obj['l'] = $f['limit'];
			if (array_key_exists('l', $f))
				$return_obj['l'] = $f['l'];
			if (array_key_exists('orderby', $f))
				$return_obj['ob'] = $f['orderby'];
			if (array_key_exists('ob', $f))
				$return_obj['ob'] = $f['ob'];
			if (array_key_exists('order', $f))
				$return_obj['o'] = $f['order'];
			if (array_key_exists('o', $f))
				$return_obj['o'] = $f['o'];
			if (array_key_exists('andor', $f))
				$return_obj['ao'] = $f['andor'];
			if (array_key_exists('ao', $f))
				$return_obj['ao'] = $f['ao'];
			if (array_key_exists('aos', $f))
				$return_obj['aos'] = $f['aos'];
			if (array_key_exists('andorsplit', $f))
				$return_obj['aos'] = $f['andorsplit'];
			return $return_obj;
		}

		private function buildExpression($table, $filter){
			/*
				{
					"c - col":"" (required),
					"op - operator":"" (required),
					"v - val":"" (required),
					"j - join":"" (optional),
					"l - limit":"" (optional),
					"ob - orderby":"" (optional),
					"o - order":"" (optional)
				}
				{
					"ao - andor":"" (optional/exclusive)
				}
			*/
			$filter = $this->standardizeFilterParameters($filter);
			$final_expression = array();
			if (array_key_exists('j', $filter)){
				$temp_expression = array("func"=>"where","expression"=>$filter['j'].'.'.$filter['c'],"values"=>$filter['v']);
			}else{
				$temp_expression = array("func"=>"where","expression"=>ucfirst($table).'.'.$filter['c'],"values"=>$filter['v']);
			}
			if (array_key_exists("ao", $filter)){
				return array(array("andor"=>$filter['ao']));
			}

			if (array_key_exists("aos", $filter)){
				return array(array("andorsplit"=>$filter['aos']));
			}

			if (!$filter['c'] || !$filter['op'] || !$filter['v']){
				return false;
			}

			//If multiple values then route to operators which allow the condition
			if (is_array($filter['v'])){
				switch(strtolower($filter['op'])){
					case "anyof":
						$temp_expression['expression'] .= " IN ?";
						break;
					case "noneof":
						$temp_expression['expression'] .= " NOT IN ?";
						break;
					case "between":
						$temp_expression = array($temp_expression,array("andor"=>"and"),$temp_expression);
						$temp_expression[0]['expression'] .= " >= ?";
						$temp_expression[0]['values'] = $temp_expression[0]['values'][0];
						$temp_expression[1]['expression'] .= " <= ?";
						$temp_expression[1]['values'] = $temp_expression[1]['values'][1];
						break;
					default:
						$temp_expression = false;
						break;
				}
			}else{
				switch(strtolower($filter['op'])){
					case "is":
					case "on":
						$temp_expression['expression'] .= " = ?";
						break;
					case "isempty":
						$temp_expression['expression'] .= " IS NULL";
						break;
					case "lt":
					case "before":
						$temp_expression['expression'] .= " < ?";
						break;
					case "gt":
					case "after":
						$temp_expression['expression'] .= " > ?";
						break;
					case "onorbefore":
					case "lte":
						$temp_expression['expression'] .= " <= ?";
						break;
					case "onorafter":
					case "gte":
						$temp_expression['expression'] .= " >= ?";
						break;
					case "noton":
					case "isnot":
						$temp_expression['expression'] .= " <> ?";
						break;
					case "contains":
						$temp_expression['expression'] .= " LIKE ?";
						$temp_expression['values'] = "%".$temp_expression['values']."%";
						break;
					case "startswith":
						$temp_expression['expression'] .= " LIKE ?";
						$temp_expression['values'] = $temp_expression['values']."%";
						break;
					case "endswith":
						$temp_expression['expression'] .= " LIKE ?";
						$temp_expression['values'] = "%".$temp_expression['values'];
					default:
						$temp_expression = false;
						break;
				}
			}

			if ($temp_expression){
				//Join Always Comes First In Flow
				if (array_key_exists('j',$filter))
					$final_expression[] = array("func"=>'join',"expression"=>'',"values"=>$filter['j']);
				//Add The Expressions Now
				if (!array_key_exists("expression", $temp_expression)){
					foreach($temp_expression AS $r){
						$final_expression[] = $r;
					}
				}else{
					$final_expression[] = $temp_expression;
				}
				// echo (array_key_exists('ob',$filter) ? 'true' : json_encode($filter));
				//Add Order By
				if (array_key_exists('ob',$filter)){
					$order_by_expression = $filter['ob'];
					$order = (array_key_exists('o', $filter)) ? strtolower($filter['o']) : "asc";
					if (array_key_exists("j", $filter)){
						$order_by_expression = $filter['j'].'.'.$filter['ob'];
					}
					$final_expression[] = array("func"=>'orderby',"expression"=>$order_by_expression,"values"=>$order);
				}
				//Add The Limits
				if (array_key_exists('l',$filter))
					$final_expression[] = array("func"=>'limit',"expression"=>"","values"=>$filter['l']);
			}
			return $final_expression;
		}
		public function runFilterExpressions($db_object, $conditions){
			// dd($db_object, $conditions);
			$cond_count = 0;
			$orderby = null;
			$limit = null;
			$andor = null;
			$andorsplit = null;
			$combines = array();
			$iteration_count = 1;
			$str_path = '';
			$wheres = 0;
			foreach ($conditions as $c){
				if (array_key_exists("func", $c) && $c['func'] == 'where')
					$wheres++;
			}
			foreach ($conditions as $c) {
				if (array_key_exists("andor", $c)){
					$andor = $c['andor'];
					$iteration_count++;
					continue;
				}
				if (array_key_exists("andorsplit", $c)){
					$andorsplit = $c['andorsplit'];
					$iteration_count++;
					continue;
				}
				if (array_key_exists("func", $c)){
					//Build Condition
					switch ($c['func']) {
						case 'limit':
							$limit = $c;
							break;
						case 'orderby':
							$orderby = $c;
							break;
						case 'join':
							$str_path .= "JOIN -> ";
							$join_with = 'join'.$c['values'];
							$db_object->join($c['values']);
							break;
						case 'where':
							$binding_type = (is_string($c['values'])) ? PDO::PARAM_STR : ((is_bool($c['values'])) ? PDO::PARAM_BOOL : PDO::PARAM_INT);
							if ($wheres > 1){
								$str_path .= 'COND -> ';
								if (strpos($c['expression'],'IS NULL') === false){
									$db_object->condition('cond'.$cond_count,$c['expression'],$c['values']);
								}else{
									// return $c['expression'];
									$db_object->condition('cond'.$cond_count,$c['expression']);
								}
							}else{
								$str_path .= 'WHERE -> ';
								if (strpos($c['expression'],'IS NULL') === false){
									$db_object->where($c['expression'],$c['values']);
								}else{
									// return $c['expression'];
									$db_object->where($c['expression']);
								}
							}
							break;
						default:
							continue;
							break;
					}
				}
				if ($iteration_count == count($conditions)){
					//This was the last condition
					if (count($combines) > 0){
						//There is a combine available
						$combines[] = "cond".$cond_count;
					}
				}
				if ($andor){
					//Combine Condition
					if (count($conditions) > 3){
						//Do A Combine
						$db_object->combine(array("cond".($cond_count - 1),"cond".$cond_count),$andor,"cond".($cond_count + 1));
						$combines[] = "cond".($cond_count + 1);
						$cond_count++;
					}else{
						//Do A Where
						// dd($db_object->toString());
						$db_object->where(array("cond".($cond_count-1),"cond".$cond_count),$andor);
					}
					if (count($combines) > 1){
						$db_object->where($combines,$andor);
						$combines = array();
					}
					$andor = null;
				}
				if ($andorsplit){
					if (count($combines) > 1){
						$db_object->where($combines,$andorsplit);
						$combines = array();
						$andorsplit = null;
					}
				}
				$cond_count++;
				$iteration_count++;
			}
			if ($orderby)
				$db_object->orderBy($orderby['expression'],$orderby['values']);
			if ($limit)
				$db_object->limit($limit['values']);
			//return $str_path;
			return $db_object;
		}
	}
?>
