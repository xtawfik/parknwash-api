<?php

/**
 * @apiGroup           City
 * @apiName            createCity
 *
 * @api                {POST} /v1/city Endpoint title here..
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
$router->post('city', [
    'as' => 'api_city_create_city',
    'uses'  => 'Controller@createCity',
    'middleware' => [
      'auth:api',
    ],
]);
