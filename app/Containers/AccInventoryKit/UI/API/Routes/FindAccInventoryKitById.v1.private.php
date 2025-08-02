<?php

/**
 * @apiGroup           AccInventoryKit
 * @apiName            findAccInventoryKitById
 *
 * @api                {GET} /v1/acc_inventory_kit/:id Endpoint title here..
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
$router->get('acc_inventory_kit/{id}', [
    'as' => 'api_accinventorykit_find_acc_inventory_kit_by_id',
    'uses'  => 'Controller@findAccInventoryKitById',
    'middleware' => [
      'auth:api',
    ],
]);
