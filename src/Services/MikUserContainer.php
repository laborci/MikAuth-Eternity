<?php namespace MikAuthEternity\Services;

use Eternity\Session\Container;
use MikAuthEternity\Interfaces\MikUserApiServiceInterface;
use MikAuthEternity\Interfaces\MikUserContainerInterface;


class MikUserContainer extends Container implements MikUserContainerInterface {

	protected $login;
	protected $name;
	protected $id;
	protected $displayNameEn;
	protected $displayNameHu;
	protected $neptun;
	protected $active;
	protected $groups;

	private $apiService;
	public function __construct(MikUserApiServiceInterface $apiService) {
		parent::__construct();
		$this->apiService = $apiService;
	}

	public function getLogin() { return $this->login; }
	public function getName() { return $this->name; }
	public function getId() {return $this->id;}
	public function getDisplayNameEn() {return $this->displayNameEn;}
	public function getDisplayNameHu() {return $this->displayNameHu;}
	public function getNeptun() {return $this->neptun;}
	public function getActive() {return $this->active;}
	public function getGroups() {return $this->groups;}
	public function isAuthenticated(): bool {return (bool)strlen($this->login);}

	public function setup($data) {
		$this->login = $data['login'];
		$this->name = $data['name'];
		$this->displayNameEn = $data['name_en'];
		$this->displayNameHu = $data['name_hu'];
		$this->neptun = $data['neptun'];
		$this->active = $data['active'];
		$this->groups = $data['groups'];
		$this->userid = $data['userid'];
		$this->id = $data['userid'];
	}

}
