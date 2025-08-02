<?php

/**
 * @apiGroup           Damaged
 * @apiName            deleteDamaged
 *
 * @api                {DELETE} /v1/damaged/:id Endpoint title here..
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
$router->delete('damaged/{id}', [
    'as' => 'api_damaged_delete_damaged',
    'uses'  => 'Controller@deleteDamaged',
    'middleware' => [
      'auth:api',
    ],
]);
