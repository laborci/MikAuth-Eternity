<?php return [
	'env'       => [
		'auth_return_url' => 'DOMAIN',
	],
	'value'     => [
		'auth-page-title'     => 'YOUR TITLE',
		'auth_redirect_class' => \MikAuthEternity\MikAuthRedirect::class,
		'auth-result-url'     => 'http://auth.' . 'login.mik.pte.hu' . '/get-result',
		'auth-token-url'      => 'http://auth.' . 'login.mik.pte.hu' . '/get-token',
		'auth-login-page'     => 'http://auth.' . 'login.mik.pte.hu' . '/login?token=',
		'user-api-url'        => 'http://api.' . 'login.mik.pte.hu' . '',
	],
	'interface' => \MikAuthEternity\Interfaces\MikAuthConfigInterface::class,
];
