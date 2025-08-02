<?php

/**
 * @apiGroup           City
 * @apiName            deleteCity
 *
 * @api                {DELETE} /v1/city/:id Endpoint title here..
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
$router->delete('city/{id}', [
    'as' => 'api_city_delete_city',
    'uses'  => 'Controller@deleteCity',
    'middleware' => [
      'auth:api',
    ],
]);
