<?php namespace MikAuthEternity\Interfaces;

interface MikUserContainerInterface {
	public function flush();
	public function forget();

	public function setup($data);
	public function isAuthenticated(): bool;

	public function getLogin();
	public function getName();
	public function getId();
	public function getDisplayNameEn();
	public function getDisplayNameHu();
	public function getNeptun();
	public function getActive();
	public function getGroups();
}