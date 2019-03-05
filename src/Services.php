<?php namespace MikAuthEternity;

use Eternity\ServiceManager\ServiceContainer;

class Services {
	static public function register($configFactoryStatic){
		ServiceContainer::shared(\MikAuthEternity\Interfaces\MikAuthConfigInterface::class)->factoryStatic($configFactoryStatic);
		ServiceContainer::shared(\MikAuthEternity\Interfaces\MikAuthServiceInterface::class)->service(\MikAuthEternity\Services\MikAuthService::class);
		ServiceContainer::shared(\MikAuthEternity\Interfaces\MikUserContainerInterface::class)->service(\MikAuthEternity\Services\MikUserContainer::class);
		ServiceContainer::shared(\MikAuthEternity\Interfaces\MikUserApiServiceInterface::class)->service(\MikAuthEternity\Services\MikUserApiService::class);
	}
}