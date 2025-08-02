<?php

/**
 * @apiGroup           Area
 * @apiName            createArea
 *
 * @api                {POST} /v1/area Endpoint title here..
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
$router->post('area', [
    'as' => 'api_area_create_area',
    'uses'  => 'Controller@createArea',
    'middleware' => [
      'auth:api',
    ],
]);
