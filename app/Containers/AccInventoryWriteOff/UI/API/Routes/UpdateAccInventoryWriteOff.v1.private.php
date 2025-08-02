<?php

/**
 * @apiGroup           AccInventoryWriteOff
 * @apiName            updateAccInventoryWriteOff
 *
 * @api                {POST} /v1/acc_inventory_write_off/:id Endpoint title here..
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
$router->post('acc_inventory_write_off/{id}', [
    'as' => 'api_accinventorywriteoff_update_acc_inventory_write_off',
    'uses'  => 'Controller@updateAccInventoryWriteOff',
    'middleware' => [
      'auth:api',
    ],
]);
