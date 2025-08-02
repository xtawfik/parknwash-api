<?php

/**
 * @apiGroup           Area
 * @apiName            deleteArea
 *
 * @api                {DELETE} /v1/area/:id Endpoint title here..
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
$router->delete('area/{id}', [
    'as' => 'api_area_delete_area',
    'uses'  => 'Controller@deleteArea',
    'middleware' => [
      'auth:api',
    ],
]);
