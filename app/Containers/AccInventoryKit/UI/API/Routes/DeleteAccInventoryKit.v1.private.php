<?php

/**
 * @apiGroup           AccInventoryKit
 * @apiName            deleteAccInventoryKit
 *
 * @api                {DELETE} /v1/acc_inventory_kit/:id Endpoint title here..
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
$router->delete('acc_inventory_kit/{id}', [
    'as' => 'api_accinventorykit_delete_acc_inventory_kit',
    'uses'  => 'Controller@deleteAccInventoryKit',
    'middleware' => [
      'auth:api',
    ],
]);
