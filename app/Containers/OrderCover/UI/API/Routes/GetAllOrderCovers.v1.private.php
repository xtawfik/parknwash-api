<?php

/**
 * @apiGroup           OrderCover
 * @apiName            getAllOrderCovers
 *
 * @api                {GET} /v1/order_cover Endpoint title here..
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
$router->get('order_cover', [
    'as' => 'api_ordercover_get_all_order_covers',
    'uses'  => 'Controller@getAllOrderCovers',
    'middleware' => [
      'auth:api',
    ],
]);
