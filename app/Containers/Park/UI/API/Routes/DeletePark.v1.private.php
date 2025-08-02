<?php

/**
 * @apiGroup           Park
 * @apiName            deletePark
 *
 * @api                {DELETE} /v1/park/:id Endpoint title here..
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
$router->delete('park/{id}', [
    'as' => 'api_park_delete_park',
    'uses'  => 'Controller@deletePark',
    'middleware' => [
      'auth:api',
    ],
]);
