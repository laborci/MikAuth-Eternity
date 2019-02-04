<?php namespace MikAuthEternity;

use Eternity\Response\Responder\Redirect;
use MikAuthEternity\Interfaces\MikAuthConfigInterface;
use MikAuthEternity\Interfaces\MikAuthServiceInterface;

class MikAuthRedirect extends Redirect {

	protected $authService;
	protected $config;


	public function __construct(MikAuthServiceInterface $authService, MikAuthConfigInterface $config) {
		$this->authService = $authService;
		$this->config = $config;
	}

	protected function login() {
		$this->url = $this->authService->isAuthenticated() ? '/' : $this->config::auth_login_page(). $this->authService->requestToken();
	}

	protected function logout() {
		$this->authService->logout();
		$this->url = '/';
	}

	protected function success() {
		$token = $this->getPathBag()->get('token');
		$this->authService->getResult($token);
		$this->url = '/';
	}

}