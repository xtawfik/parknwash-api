<?php

/**
 * @apiGroup           ClientOrder
 * @apiName            createClientOrder
 *
 * @api                {POST} /v1/client_order Endpoint title here..
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
$router->post('client_order', [
    'as' => 'api_clientorder_create_client_order',
    'uses'  => 'Controller@createClientOrder',
    'middleware' => [
      'auth:api',
    ],
]);
