<?php

/**
 * @apiGroup           ClientOrder
 * @apiName            deleteClientOrder
 *
 * @api                {DELETE} /v1/client_order/:id Endpoint title here..
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
$router->delete('client_order/{id}', [
    'as' => 'api_clientorder_delete_client_order',
    'uses'  => 'Controller@deleteClientOrder',
    'middleware' => [
      'auth:api',
    ],
]);
