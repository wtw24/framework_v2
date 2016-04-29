<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        return render_template($request);
    }
)));

$routes->add('bye', new Routing\Route('/bye'));

return $routes;

/*

// This is rather flexible as you can change the Response object
// afterwards and you can even pass additional arguments to the template:

$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo will be available in the template
        $request->attributes->set('foo', 'bar');

        $response = render_template($request);

        // change some header
        $response->headers->set('Content-Type', 'text/plain');

        return $response;
    }
)));

*/

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