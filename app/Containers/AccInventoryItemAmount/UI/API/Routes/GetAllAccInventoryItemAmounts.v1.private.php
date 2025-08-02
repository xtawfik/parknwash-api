<?php

/**
 * @apiGroup           AccInventoryItemAmount
 * @apiName            getAllAccInventoryItemAmounts
 *
 * @api                {GET} /v1/acc_inventory_item_amount Endpoint title here..
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
$router->get('acc_inventory_item_amount', [
    'as' => 'api_accinventoryitemamount_get_all_acc_inventory_item_amounts',
    'uses'  => 'Controller@getAllAccInventoryItemAmounts',
    'middleware' => [
      'auth:api',
    ],
]);
