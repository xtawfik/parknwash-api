<?php

/**
 * @apiGroup           OrderCover
 * @apiName            findOrderCoverById
 *
 * @api                {GET} /v1/order_cover/:id Endpoint title here..
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
$router->get('order_cover/{id}', [
    'as' => 'api_ordercover_find_order_cover_by_id',
    'uses'  => 'Controller@findOrderCoverById',
    'middleware' => [
      'auth:api',
    ],
]);
