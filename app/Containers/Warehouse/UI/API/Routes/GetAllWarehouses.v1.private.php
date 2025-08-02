<?php

/**
 * @apiGroup           Warehouse
 * @apiName            getAllWarehouses
 *
 * @api                {GET} /v1/warehouse Endpoint title here..
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
$router->get('warehouse', [
    'as' => 'api_warehouse_get_all_warehouses',
    'uses'  => 'Controller@getAllWarehouses',
    'middleware' => [
      'auth:api',
    ],
]);
