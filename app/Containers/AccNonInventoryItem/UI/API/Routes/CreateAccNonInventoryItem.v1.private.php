<?php

/**
 * @apiGroup           AccNonInventoryItem
 * @apiName            createAccNonInventoryItem
 *
 * @api                {POST} /v1/acc_non_inventory_item Endpoint title here..
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
$router->post('acc_non_inventory_item', [
    'as' => 'api_accnoninventoryitem_create_acc_non_inventory_item',
    'uses'  => 'Controller@createAccNonInventoryItem',
    'middleware' => [
      'auth:api',
    ],
]);
