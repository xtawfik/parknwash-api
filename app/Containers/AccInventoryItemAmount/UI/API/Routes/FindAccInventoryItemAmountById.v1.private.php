<?php

/**
 * @apiGroup           AccInventoryItemAmount
 * @apiName            findAccInventoryItemAmountById
 *
 * @api                {GET} /v1/acc_inventory_item_amount/:id Endpoint title here..
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
$router->get('acc_inventory_item_amount/{id}', [
    'as' => 'api_accinventoryitemamount_find_acc_inventory_item_amount_by_id',
    'uses'  => 'Controller@findAccInventoryItemAmountById',
    'middleware' => [
      'auth:api',
    ],
]);
