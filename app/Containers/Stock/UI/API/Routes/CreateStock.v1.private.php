<?php

/**
 * @apiGroup           Stock
 * @apiName            createStock
 *
 * @api                {POST} /v1/stock Endpoint title here..
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
$router->post('stock', [
    'as' => 'api_stock_create_stock',
    'uses'  => 'Controller@createStock',
    'middleware' => [
      'auth:api',
    ],
]);
