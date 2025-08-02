<?php

/**
 * @apiGroup           AccInventoryTransfer
 * @apiName            findAccInventoryTransferById
 *
 * @api                {GET} /v1/acc_inventory_transfer/:id Endpoint title here..
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
$router->get('acc_inventory_transfer/{id}', [
    'as' => 'api_accinventorytransfer_find_acc_inventory_transfer_by_id',
    'uses'  => 'Controller@findAccInventoryTransferById',
    'middleware' => [
      'auth:api',
    ],
]);
