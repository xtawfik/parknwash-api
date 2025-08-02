<?php

/**
 * @apiGroup           OrderCover
 * @apiName            createOrderCover
 *
 * @api                {POST} /v1/order_cover Endpoint title here..
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
$router->post('order_cover', [
    'as' => 'api_ordercover_create_order_cover',
    'uses'  => 'Controller@createOrderCover',
    'middleware' => [
      'auth:api',
    ],
]);
