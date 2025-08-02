<?php

/**
 * @apiGroup           StockOut
 * @apiName            deleteStockOut
 *
 * @api                {DELETE} /v1/stock_out/:id Endpoint title here..
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
$router->delete('stock_out/{id}', [
    'as' => 'api_stockout_delete_stock_out',
    'uses'  => 'Controller@deleteStockOut',
    'middleware' => [
      'auth:api',
    ],
]);
