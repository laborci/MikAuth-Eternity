<?php namespace MikAuthEternity;

use Eternity\Response\Responder\Middleware;
use MikAuthEternity\Interfaces\MikAuthServiceInterface;
use MikAuthEternity\Interfaces\MikAuthConfigInterface;

class MikAuthCheckMiddleware extends Middleware {

	protected $authService;
	protected $config;

	public function __construct(MikAuthServiceInterface $authService, MikAuthConfigInterface $config) {
		$this->authService = $authService;
		$this->config = $config;
	}

	protected function run() {
		$userOnly = $this->getArgumentsBag()->getBoolean('userOnly', false);
		if ($this->authService->isAuthenticated()) {
			$this->next();
		} else {
			$this->authService->logout();
			$this->break([$this->config::auth_redirect_class(), 'login'], ['userOnly'=>$userOnly]);
		}
	}

}
