<?php

/**
 * @apiGroup           StockIn
 * @apiName            findStockInById
 *
 * @api                {GET} /v1/stock_in/:id Endpoint title here..
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
$router->get('stock_in/{id}', [
    'as' => 'api_stockin_find_stock_in_by_id',
    'uses'  => 'Controller@findStockInById',
    'middleware' => [
      'auth:api',
    ],
]);
