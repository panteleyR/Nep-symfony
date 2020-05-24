<?php
//$cache = new \Memcached();
//$cache->addServer('sectionksmemcachedhost', '11211');
//$keys = $cache->getAllKeys();
//$cache->getDelayed($keys);
//$store = $cache->fetchAll();
//print_r("<pre>");
//print_r($store);
//print_r("</pre>");
////exit;
//session_start();
////$_SESSION['hgf'] = 543;
//print_r($_SESSION);
//print_r(session_save_path());
//
//session_write_close();
////print_r(session_get_cookie_params());
//exit;
use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;
require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
