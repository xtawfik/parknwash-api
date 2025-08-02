<?php

/**
 * @apiGroup           Warehouse
 * @apiName            deleteWarehouse
 *
 * @api                {DELETE} /v1/warehouse/:id Endpoint title here..
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
$router->delete('warehouse/{id}', [
    'as' => 'api_warehouse_delete_warehouse',
    'uses'  => 'Controller@deleteWarehouse',
    'middleware' => [
      'auth:api',
    ],
]);
