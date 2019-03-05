<?php namespace MikAuthEternity\Services;

use MikAuthEternity\Interfaces\{MikAuthConfigInterface,
	MikAuthServiceInterface,
	MikUserApiServiceInterface,
	MikUserContainerInterface};
use Unirest\Request;

class MikAuthService implements MikAuthServiceInterface {

	protected $userContainer;
	protected $apiService;
	protected $config;

	public function __construct(MikUserContainerInterface $userContainer, MikUserApiServiceInterface $apiService, MikAuthConfigInterface $config) {
		$this->userContainer = $userContainer;
		$this->apiService = $apiService;
		$this->config = $config;
	}

	public function requestToken() {
		$response = Request::post(
			$this->config::auth_token_url(),
			['Accept' => 'application/json'],
			Request\Body::form([
				'url'   => 'http://'.$this->config::auth_return_url(),
				'title' => $this->config::auth_page_title(),
			])
		);
		return json_decode($response->raw_body, true);
	}

	public function getResult($token): MikUserContainerInterface {
		$response = Request::post(
			$this->config::auth_result_url(),
			['Accept' => 'application/json'],
			Request\Body::form(['token' => $token])
		);
		$result = json_decode($response->raw_body, true);
		$this->userContainer->setup($result);
		$this->userContainer->flush();
		return $this->userContainer;
	}

	public function logout() {
		$this->userContainer->forget();
		$this->userContainer->flush();
	}

	public function isAuthenticated() { return $this->userContainer->isAuthenticated(); }

	public function getUser($create = true) {
		$user = $this->apiService->seekUser($this->userContainer->getLogin());
		return $user?:null;
	}

}

