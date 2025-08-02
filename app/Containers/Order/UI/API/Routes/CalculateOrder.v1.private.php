<?php

/**
 * @apiGroup           Order
 * @apiName            calculateOrderPrice
 *
 * @api                {GET} /v1/order/calculate Endpoint title here..
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
$router->post('order/calculate', [
    'as' => 'api_order_calculate_order_price',
    'uses'  => 'Controller@calculateOrderPrice',
    'middleware' => [
      'auth:api',
    ],
]);

