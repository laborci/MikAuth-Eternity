<?php namespace MikAuthEternity\Interfaces;

interface MikAuthConfigInterface {
	static public function auth_page_title();
	static public function auth_redirect_class();
	static public function auth_result_url();
	static public function auth_token_url();
	static public function auth_login_page();
	static public function user_api_url();
	static public function auth_return_url();
}
