<?php

/**
 * @apiGroup           OrderCover
 * @apiName            updateOrderCover
 *
 * @api                {POST} /v1/order_cover/:id Endpoint title here..
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
$router->post('order_cover/{id}', [
    'as' => 'api_ordercover_update_order_cover',
    'uses'  => 'Controller@updateOrderCover',
    'middleware' => [
      'auth:api',
    ],
]);
