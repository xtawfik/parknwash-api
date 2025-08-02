<?php

/**
 * @apiGroup           Area
 * @apiName            updateArea
 *
 * @api                {POST} /v1/area/:id Endpoint title here..
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
$router->post('area/{id}', [
    'as' => 'api_area_update_area',
    'uses'  => 'Controller@updateArea',
    'middleware' => [
      'auth:api',
    ],
]);
