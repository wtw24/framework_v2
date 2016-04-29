<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;


/*

use Symfony\Component\Routing;

$generator = new Routing\Generator\UrlGenerator($routes, $context);

echo $generator->generate('hello', array('name' => 'Fabien'));
// outputs /hello/Fabien

*/


/*

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

echo $generator->generate(
    'hello',
    array('name' => 'Fabien'),
    UrlGeneratorInterface::ABSOLUTE_URL
);
// outputs something like http://example.com/somewhere/hello/Fabien

*/

/*

$dumper = new Routing\Matcher\Dumper\PhpMatcherDumper($routes);

echo $dumper->dump();

 */