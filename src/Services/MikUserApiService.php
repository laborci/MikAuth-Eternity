<?php namespace MikAuthEternity\Services;

use MikAuthEternity\Interfaces\MikAuthConfigInterface;
use MikAuthEternity\Interfaces\MikUserApiServiceInterface;
use Unirest\Request;

class MikUserApiService implements MikUserApiServiceInterface {

	protected $userContainer;
	protected $api;

	public function __construct(MikAuthConfigInterface $config) {
		$this->api = $config::user_api_url();
	}

	public function getUser(int $id){
		$response = Request::get($this->api.'/user/'.$id);
		return json_decode($response->raw_body, true);
	}

	public function seekUser($login){
		$response = Request::get($this->api.'/user/seek/'.$login);
		return json_decode($response->raw_body, true);
	}


	public function searchUser($search){
		$response = Request::get($this->api.'/user/search/'.$search);
		return json_decode($response->raw_body, true);
	}

	/**
	 * @deprecated 
	 */
	public function createUser($data){
		$response = Request::post($this->api.'/user/create', ['Accept' => 'application/json'], Request\Body::form($data));
		return json_decode($response->raw_body, true);
	}

}