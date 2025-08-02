<?php

/**
 * @apiGroup           CustodyMovement
 * @apiName            deleteCustodyMovement
 *
 * @api                {DELETE} /v1/custody_movement/:id Endpoint title here..
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
$router->delete('custody_movement/{id}', [
    'as' => 'api_custodymovement_delete_custody_movement',
    'uses'  => 'Controller@deleteCustodyMovement',
    'middleware' => [
      'auth:api',
    ],
]);
