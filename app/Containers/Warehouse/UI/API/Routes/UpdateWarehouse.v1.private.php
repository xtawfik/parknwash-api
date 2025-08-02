<?php

/**
 * @apiGroup           Warehouse
 * @apiName            updateWarehouse
 *
 * @api                {POST} /v1/warehouse/:id Endpoint title here..
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
$router->post('warehouse/{id}', [
    'as' => 'api_warehouse_update_warehouse',
    'uses'  => 'Controller@updateWarehouse',
    'middleware' => [
      'auth:api',
    ],
]);
