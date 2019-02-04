<?php namespace MikAuthEternity;

use Eternity\ServiceManager\ServiceContainer;

class Services {
	static public function register($configFactoryStatic){
		ServiceContainer::bind(\MikAuthEternity\Interfaces\MikAuthConfigInterface::class)->factoryStatic($configFactoryStatic)->shared();
		ServiceContainer::bind(\MikAuthEternity\Interfaces\MikAuthServiceInterface::class)->service(\MikAuthEternity\Services\MikAuthService::class)->shared();
		ServiceContainer::bind(\MikAuthEternity\Interfaces\MikUserContainerInterface::class)->service(\MikAuthEternity\Services\MikUserContainer::class)->shared();
		ServiceContainer::bind(\MikAuthEternity\Interfaces\MikUserApiServiceInterface::class)->service(\MikAuthEternity\Services\MikUserApiService::class)->shared();
	}
}