<?php

/**
 * @apiGroup           Contract
 * @apiName            createContract
 *
 * @api                {POST} /v1/contract Endpoint title here..
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
$router->post('contract', [
    'as' => 'api_contract_create_contract',
    'uses'  => 'Controller@createContract',
    'middleware' => [
      'auth:api',
    ],
]);
