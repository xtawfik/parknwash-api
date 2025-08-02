<?php

/**
 * @apiGroup           AccInventoryWriteOff
 * @apiName            findAccInventoryWriteOffById
 *
 * @api                {GET} /v1/acc_inventory_write_off/:id Endpoint title here..
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
$router->get('acc_inventory_write_off/{id}', [
    'as' => 'api_accinventorywriteoff_find_acc_inventory_write_off_by_id',
    'uses'  => 'Controller@findAccInventoryWriteOffById',
    'middleware' => [
      'auth:api',
    ],
]);
