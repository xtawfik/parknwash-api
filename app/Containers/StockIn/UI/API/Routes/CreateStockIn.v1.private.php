<?php

/**
 * @apiGroup           StockIn
 * @apiName            createStockIn
 *
 * @api                {POST} /v1/stock_in Endpoint title here..
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
$router->post('stock_in', [
    'as' => 'api_stockin_create_stock_in',
    'uses'  => 'Controller@createStockIn',
    'middleware' => [
      'auth:api',
    ],
]);
