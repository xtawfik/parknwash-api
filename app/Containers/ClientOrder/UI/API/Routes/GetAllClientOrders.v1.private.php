<?php

/**
 * @apiGroup           ClientOrder
 * @apiName            getAllClientOrders
 *
 * @api                {GET} /v1/client_order Endpoint title here..
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
$router->get('client_order', [
    'as' => 'api_clientorder_get_all_client_orders',
    'uses'  => 'Controller@getAllClientOrders',
    'middleware' => [
      'auth:api',
    ],
]);
