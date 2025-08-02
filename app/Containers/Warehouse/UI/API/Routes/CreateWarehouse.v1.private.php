<?php

/**
 * @apiGroup           Warehouse
 * @apiName            createWarehouse
 *
 * @api                {POST} /v1/warehouse Endpoint title here..
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
$router->post('warehouse', [
    'as' => 'api_warehouse_create_warehouse',
    'uses'  => 'Controller@createWarehouse',
    'middleware' => [
      'auth:api',
    ],
]);
