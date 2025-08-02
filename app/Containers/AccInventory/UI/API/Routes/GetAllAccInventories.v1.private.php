<?php

/**
 * @apiGroup           AccInventory
 * @apiName            getAllAccInventories
 *
 * @api                {GET} /v1/acc_inventory Endpoint title here..
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
$router->get('acc_inventory', [
    'as' => 'api_accinventory_get_all_acc_inventories',
    'uses'  => 'Controller@getAllAccInventories',
    'middleware' => [
      'auth:api',
    ],
]);
