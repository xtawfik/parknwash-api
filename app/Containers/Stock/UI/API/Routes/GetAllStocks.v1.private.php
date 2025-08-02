<?php

/**
 * @apiGroup           Stock
 * @apiName            getAllStocks
 *
 * @api                {GET} /v1/stock Endpoint title here..
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
$router->get('stock', [
    'as' => 'api_stock_get_all_stocks',
    'uses'  => 'Controller@getAllStocks',
    'middleware' => [
      'auth:api',
    ],
]);
