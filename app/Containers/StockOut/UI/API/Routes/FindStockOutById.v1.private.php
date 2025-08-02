<?php

/**
 * @apiGroup           StockOut
 * @apiName            findStockOutById
 *
 * @api                {GET} /v1/stock_out/:id Endpoint title here..
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
$router->get('stock_out/{id}', [
    'as' => 'api_stockout_find_stock_out_by_id',
    'uses'  => 'Controller@findStockOutById',
    'middleware' => [
      'auth:api',
    ],
]);
