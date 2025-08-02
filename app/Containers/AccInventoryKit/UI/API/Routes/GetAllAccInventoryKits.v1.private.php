<?php

/**
 * @apiGroup           AccInventoryKit
 * @apiName            getAllAccInventoryKits
 *
 * @api                {GET} /v1/acc_inventory_kit Endpoint title here..
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
$router->get('acc_inventory_kit', [
    'as' => 'api_accinventorykit_get_all_acc_inventory_kits',
    'uses'  => 'Controller@getAllAccInventoryKits',
    'middleware' => [
      'auth:api',
    ],
]);
