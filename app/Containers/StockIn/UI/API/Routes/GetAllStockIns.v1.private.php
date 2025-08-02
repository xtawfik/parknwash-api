<?php

/**
 * @apiGroup           StockIn
 * @apiName            getAllStockIns
 *
 * @api                {GET} /v1/stock_in Endpoint title here..
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
$router->get('stock_in', [
    'as' => 'api_stockin_get_all_stock_ins',
    'uses'  => 'Controller@getAllStockIns',
    'middleware' => [
      'auth:api',
    ],
]);
