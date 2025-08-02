<?php

/**
 * @apiGroup           Order
 * @apiName            createOrder
 *
 * @api                {POST} /v1/order Endpoint title here..
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
$router->post('order', [
    'as' => 'api_order_create_order',
    'uses'  => 'Controller@createOrder',
    'middleware' => [
      'auth:api',
    ],
]);
