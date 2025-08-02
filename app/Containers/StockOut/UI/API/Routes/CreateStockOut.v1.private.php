<?php

/**
 * @apiGroup           StockOut
 * @apiName            createStockOut
 *
 * @api                {POST} /v1/stock_out Endpoint title here..
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
$router->post('stock_out', [
    'as' => 'api_stockout_create_stock_out',
    'uses'  => 'Controller@createStockOut',
    'middleware' => [
      'auth:api',
    ],
]);
