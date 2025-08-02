<?php

/**
 * @apiGroup           Contract
 * @apiName            updateContract
 *
 * @api                {POST} /v1/contract/:id Endpoint title here..
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
$router->post('contract/{id}', [
    'as' => 'api_contract_update_contract',
    'uses'  => 'Controller@updateContract',
    'middleware' => [
      'auth:api',
    ],
]);
