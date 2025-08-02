<?php

/**
 * @apiGroup           City
 * @apiName            findCityById
 *
 * @api                {GET} /v1/city/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('city/{id}', [
    'as' => 'api_city_find_city_by_id',
    'uses'  => 'Controller@findCityById',
    'middleware' => [
      'auth:api',
    ],
]);
