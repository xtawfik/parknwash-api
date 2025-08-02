<?php

/**
 * @apiGroup           AccInventoryTransfer
 * @apiName            getAllAccInventoryTransfers
 *
 * @api                {GET} /v1/acc_inventory_transfer Endpoint title here..
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
$router->get('acc_inventory_transfer', [
    'as' => 'api_accinventorytransfer_get_all_acc_inventory_transfers',
    'uses'  => 'Controller@getAllAccInventoryTransfers',
    'middleware' => [
      'auth:api',
    ],
]);
