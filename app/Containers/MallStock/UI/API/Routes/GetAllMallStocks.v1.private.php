<?php

/**
 * @apiGroup           MallStock
 * @apiName            getAllMallStocks
 *
 * @api                {GET} /v1/mall_stock Endpoint title here..
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
$router->get('mall_stock', [
    'as' => 'api_mallstock_get_all_mall_stocks',
    'uses'  => 'Controller@getAllMallStocks',
    'middleware' => [
      'auth:api',
    ],
]);
