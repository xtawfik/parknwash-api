<?php

/**
 * @apiGroup           AccNonInventoryItem
 * @apiName            deleteAccNonInventoryItem
 *
 * @api                {DELETE} /v1/acc_non_inventory_item/:id Endpoint title here..
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
$router->delete('acc_non_inventory_item/{id}', [
    'as' => 'api_accnoninventoryitem_delete_acc_non_inventory_item',
    'uses'  => 'Controller@deleteAccNonInventoryItem',
    'middleware' => [
      'auth:api',
    ],
]);
