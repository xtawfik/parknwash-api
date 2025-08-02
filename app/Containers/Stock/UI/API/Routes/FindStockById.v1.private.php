<?php

/**
 * @apiGroup           Stock
 * @apiName            findStockById
 *
 * @api                {GET} /v1/stock/:id Endpoint title here..
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
$router->get('stock/{id}', [
    'as' => 'api_stock_find_stock_by_id',
    'uses'  => 'Controller@findStockById',
    'middleware' => [
      'auth:api',
    ],
]);
