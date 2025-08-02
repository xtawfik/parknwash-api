<?php

/**
 * @apiGroup           Order
 * @apiName            findOrderById
 *
 * @api                {GET} /v1/order/:id Endpoint title here..
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
$router->get('app/search/client', [
    'as' => 'api_client_search',
    'uses'  => 'ClientSearchController@search',
    'middleware' => [
      'auth:api',
    ],
]);

$router->get('app/search/mall', [
    'as' => 'api_employee_mall',
    'uses'  => 'ClientSearchController@mall',
    'middleware' => [
      'auth:api',
    ],
]);
