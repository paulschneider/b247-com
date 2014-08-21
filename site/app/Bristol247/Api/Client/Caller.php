<?php namespace Bristol247\Api\Client;

//http://api.guzzlephp.org/class-Guzzle.Http.Message.Request.html

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Config;

Class Caller {

	protected $client;
	protected $endpoint;

	public function __construct()
	{
		$this->client = new Client( [ 'base_url' => Config::get('api.baseUrl') ] );
	}

	public function get($endpoint = "", $params = [], $headers = [])
	{
		$this->endpoint = $endpoint;

		if( ! anExternalUrl($this->endpoint) )
		{
			$this->endpoint = $this->client->getBaseUrl().$this->endpoint;	
		}		

		$request = $this->client->createRequest('GET', $this->endpoint, [
			'headers' => $headers,
			'query' => $params
		]);

		return $this->send($request);
	}

	public function post($endpoint = "/", $data = [], $headers = [])
	{
		$this->endpoint = $endpoint;

		$request = $this->client->createRequest('POST', $this->endpoint, ['body' => $data, 'headers' => $headers]);

		return $this->send($request);
	}

	public function send($request)
	{
		logApiCall($this->endpoint);

		try 
		{
		   return $this->client->send($request)->json();
		} 
		catch (ClientException $e) 
		{
			return $e->getResponse()->json();
		}
	}
}