<?php

/**
 * @apiGroup           AccNonInventoryItem
 * @apiName            findAccNonInventoryItemById
 *
 * @api                {GET} /v1/acc_non_inventory_item/:id Endpoint title here..
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
$router->get('acc_non_inventory_item/{id}', [
    'as' => 'api_accnoninventoryitem_find_acc_non_inventory_item_by_id',
    'uses'  => 'Controller@findAccNonInventoryItemById',
    'middleware' => [
      'auth:api',
    ],
]);
