<?php

/**
 * @apiGroup           AccInventoryTransfer
 * @apiName            createAccInventoryTransfer
 *
 * @api                {POST} /v1/acc_inventory_transfer Endpoint title here..
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
$router->post('acc_inventory_transfer', [
    'as' => 'api_accinventorytransfer_create_acc_inventory_transfer',
    'uses'  => 'Controller@createAccInventoryTransfer',
    'middleware' => [
      'auth:api',
    ],
]);
