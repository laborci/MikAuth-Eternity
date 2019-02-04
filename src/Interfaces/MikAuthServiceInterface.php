<?php namespace MikAuthEternity\Interfaces;

interface MikAuthServiceInterface{

	public function requestToken():string;
	public function getResult($token): MikUserContainerInterface;
	public function logout();
	public function isWorker();
	public function isAuthenticated();
	public function getUser($create = true);

}