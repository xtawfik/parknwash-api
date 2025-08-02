<?php

/**
 * @apiGroup           Warehouse
 * @apiName            findWarehouseById
 *
 * @api                {GET} /v1/warehouse/:id Endpoint title here..
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
$router->get('warehouse/{id}', [
    'as' => 'api_warehouse_find_warehouse_by_id',
    'uses'  => 'Controller@findWarehouseById',
    'middleware' => [
      'auth:api',
    ],
]);
