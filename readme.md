### Eternity module for handling MIK-AUTH

copy the config file into your global configs, add it to your config builder

```
'mik-auth' => include "global/mik-auth.php",
```

Add  MikAuthEternity to the ServiceContainer

```
\MikAuthEternity\Services::register([Config::class, 'mik_auth']);
```

finally add auth paths to your router

```
$router->get('/auth/login', [MikAuthRedirect::class, 'login'])();
$router->get('/auth/success/{token}', [MikAuthRedirect::class, 'success'])();
$router->pipe(MikAuthCheckMiddleware::class);
$router->get('/auth/logout', [MikAuthRedirect::class, 'logout'])();
```