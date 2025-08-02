<?php

/**
 * @apiGroup           AccInventoryItem
 * @apiName            createAccInventoryItem
 *
 * @api                {POST} /v1/acc_inventory_item Endpoint title here..
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
$router->post('acc_inventory_item', [
    'as' => 'api_accinventoryitem_create_acc_inventory_item',
    'uses'  => 'Controller@createAccInventoryItem',
    'middleware' => [
      'auth:api',
    ],
]);
