<?php

/**
 * @apiGroup           Park
 * @apiName            createPark
 *
 * @api                {POST} /v1/park Endpoint title here..
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
$router->post('park', [
    'as' => 'api_park_create_park',
    'uses'  => 'Controller@createPark',
    'middleware' => [
      'auth:api',
    ],
]);
