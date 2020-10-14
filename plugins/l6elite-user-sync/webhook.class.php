<?php

class L6EliteUserSyncWebhook
{

	private $event;
	private $data;
	private $secret = 'Hyrn51NHGWjEX6Vj6GaOq9sIiOzUqd2sKZ8xoG1Uvc2QYLFals769WdSh6N1dQAoBKswh9hkxFtLfHcg72J1hpPslUReGLeq6yzYoOglWBqeOPARYxWPcTzXU1O4HjQWpE4uGs10sbhCW6gwpurUdSORVYMShkfmdbN7hpUc9htiXqtT2XmkN7SyOajo3Fn87r8U0tdcfBNwcIFILzlxYkfYwk23xjVr8TdCgKlKKXyjXzHyZJfcHGPxDdKTsSQP';
	private $url = 'https://api.l6elite.com/?subscription_webhook=1';
	private $logPath;

	public function __construct($event, $data)
	{
		$this->logPath = rtrim(L6ELITE_USER_SYNC_ROOT, '/') . '/api.log';
		$this->event = $event;
		$this->data = $data;
		$this->send();
	}

	private function send()
	{

		$client = new \GuzzleHttp\Client();
		
		$response = $client->request('POST', $this->url, [
			'verify' => false, // ignore ssl errors
			'json' => [
				'event' => $this->event,
				'webhook_secret' => $this->secret,
				'data' => $this->data
			]
		]);

		$this->log($response->getBody());

	}

	private function log($response)
	{

		$logContent = '===========================================================' . PHP_EOL;
		$logContent .= 'Date: ' . date('Y-m-d H:i:s') . PHP_EOL;
		$logContent .= 'Event: ' . $this->event . PHP_EOL;
		$logContent .= 'Request payload:' . PHP_EOL;
		$logContent .= json_encode($this->data) . PHP_EOL;
		$logContent .= 'Response:' . PHP_EOL;
		$logContent .= $response . PHP_EOL;
		$logContent .= '===========================================================' . PHP_EOL . PHP_EOL;

		file_put_contents($this->logPath, $logContent, FILE_APPEND);

	}

}