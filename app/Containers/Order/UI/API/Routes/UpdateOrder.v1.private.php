<?php

/**
 * @apiGroup           Order
 * @apiName            updateOrder
 *
 * @api                {POST} /v1/order/:id Endpoint title here..
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
$router->post('order/{id}', [
    'as' => 'api_order_update_order',
    'uses'  => 'Controller@updateOrder',
    'middleware' => [
      'auth:api',
    ],
]);
