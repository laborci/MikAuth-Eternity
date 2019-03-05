<?php namespace MikAuthEternity\Interfaces;

interface MikUserApiServiceInterface{

	public function getUser(int $id);
	public function seekUser($login);
	public function searchUser($search);
	//public function createUser($data);

}