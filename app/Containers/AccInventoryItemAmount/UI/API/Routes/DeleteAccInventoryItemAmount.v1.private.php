<?php

/**
 * @apiGroup           AccInventoryItemAmount
 * @apiName            deleteAccInventoryItemAmount
 *
 * @api                {DELETE} /v1/acc_inventory_item_amount/:id Endpoint title here..
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
$router->delete('acc_inventory_item_amount/{id}', [
    'as' => 'api_accinventoryitemamount_delete_acc_inventory_item_amount',
    'uses'  => 'Controller@deleteAccInventoryItemAmount',
    'middleware' => [
      'auth:api',
    ],
]);
