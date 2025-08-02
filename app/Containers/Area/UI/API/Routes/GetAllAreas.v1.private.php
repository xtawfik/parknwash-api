<?php

/**
 * @apiGroup           Area
 * @apiName            getAllAreas
 *
 * @api                {GET} /v1/area Endpoint title here..
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
$router->get('area', [
    'as' => 'api_area_get_all_areas',
    'uses'  => 'Controller@getAllAreas',
    'middleware' => [
      'auth:api',
    ],
]);
