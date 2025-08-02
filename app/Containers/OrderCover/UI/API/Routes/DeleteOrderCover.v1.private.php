<?php

/**
 * @apiGroup           OrderCover
 * @apiName            deleteOrderCover
 *
 * @api                {DELETE} /v1/order_cover/:id Endpoint title here..
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
$router->delete('order_cover/{id}', [
    'as' => 'api_ordercover_delete_order_cover',
    'uses'  => 'Controller@deleteOrderCover',
    'middleware' => [
      'auth:api',
    ],
]);
