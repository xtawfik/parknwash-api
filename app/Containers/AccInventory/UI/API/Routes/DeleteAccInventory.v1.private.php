<?php

/**
 * @apiGroup           AccInventory
 * @apiName            deleteAccInventory
 *
 * @api                {DELETE} /v1/acc_inventory/:id Endpoint title here..
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
$router->delete('acc_inventory/{id}', [
    'as' => 'api_accinventory_delete_acc_inventory',
    'uses'  => 'Controller@deleteAccInventory',
    'middleware' => [
      'auth:api',
    ],
]);
