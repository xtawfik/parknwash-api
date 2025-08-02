<?php

/**
 * @apiGroup           Contract
 * @apiName            deleteContract
 *
 * @api                {DELETE} /v1/contract/:id Endpoint title here..
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
$router->delete('contract/{id}', [
    'as' => 'api_contract_delete_contract',
    'uses'  => 'Controller@deleteContract',
    'middleware' => [
      'auth:api',
    ],
]);
