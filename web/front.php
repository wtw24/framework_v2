<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$routes = include __DIR__.'/../src/app.php';
$sc = include __DIR__.'/../src/container.php';

$sc->register('listener.string_response', 'Simplex\StringResponseListener');
$sc->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.string_response')))
;

//$sc->setParameter('debug', true);
//echo $sc->getParameter('debug');

$sc->setParameter('charset', 'UTF-8');


$request = Request::createFromGlobals();

$response = $sc->get('framework')->handle($request);

$response->send();