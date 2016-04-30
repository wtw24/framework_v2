<?php

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        $leapyear = new LeapYear();
        if ($leapyear->isLeapYear($year)) {
            $response = new Response('Yep, this is a leap year! '.rand());
        } else {
            $response = new Response('Nope, this is not a leap year.');
        }

        $response->setTtl(10);

        // $date = date_create_from_format('Y-m-d H:i:s', '2005-10-15 10:00:00');
        //
        // $response->setCache(array(
        //    'public'        => true,
        //    'etag'          => 'abcde',
        //    'last_modified' => $date,
        //    'max_age'       => 10,
        //    's_maxage'      => 10,
        // ));

        // it is equivalent to the following code

        // $response->setPublic();
        // $response->setEtag('abcde');
        // $response->setLastModified($date);
        // $response->setMaxAge(10);
        // $response->setSharedMaxAge(10);

        return $response;
    }
}


/*

http://symfony.com/doc/current/create_framework/http_kernel_httpkernelinterface.html

-------------------------------

$response->setETag('whatever_you_compute_as_an_etag');

if ($response->isNotModified($request)) {
    return $response;
}

$response->setContent('The computed content of the response');

return $response;

-------------------------------

This is the content of your page

Is 2012 a leap year? <esi:include src="/leapyear/2012" />

Some other content

-------------------------------

$framework = new HttpKernel\HttpCache\HttpCache(
    $framework,
    new HttpKernel\HttpCache\Store(__DIR__.'/../cache'),
    new HttpKernel\HttpCache\Esi()
);

-------------------------------

$framework = new HttpKernel\HttpCache\HttpCache(
    $framework,
    new HttpKernel\HttpCache\Store(__DIR__.'/../cache'),
    new HttpKernel\HttpCache\Esi(),
    array('debug' => true)
);

-------------------------------


X-Symfony-Cache:  GET /is_leap_year/2012: stale, invalid, store

X-Symfony-Cache:  GET /is_leap_year/2012: fresh
