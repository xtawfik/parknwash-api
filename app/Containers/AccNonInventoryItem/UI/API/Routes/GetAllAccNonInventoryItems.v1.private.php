<?php

/**
 * @apiGroup           AccNonInventoryItem
 * @apiName            getAllAccNonInventoryItems
 *
 * @api                {GET} /v1/acc_non_inventory_item Endpoint title here..
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
$router->get('acc_non_inventory_item', [
    'as' => 'api_accnoninventoryitem_get_all_acc_non_inventory_items',
    'uses'  => 'Controller@getAllAccNonInventoryItems',
    'middleware' => [
      'auth:api',
    ],
]);
