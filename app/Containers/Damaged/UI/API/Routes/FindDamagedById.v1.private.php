<?php

/**
 * @apiGroup           Damaged
 * @apiName            findDamagedById
 *
 * @api                {GET} /v1/damaged/:id Endpoint title here..
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
$router->get('damaged/{id}', [
    'as' => 'api_damaged_find_damaged_by_id',
    'uses'  => 'Controller@findDamagedById',
    'middleware' => [
      'auth:api',
    ],
]);
