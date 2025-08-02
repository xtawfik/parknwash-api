<?php

/**
 * @apiGroup           AccInventoryItemAmount
 * @apiName            createAccInventoryItemAmount
 *
 * @api                {POST} /v1/acc_inventory_item_amount Endpoint title here..
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
$router->post('acc_inventory_item_amount', [
    'as' => 'api_accinventoryitemamount_create_acc_inventory_item_amount',
    'uses'  => 'Controller@createAccInventoryItemAmount',
    'middleware' => [
      'auth:api',
    ],
]);
