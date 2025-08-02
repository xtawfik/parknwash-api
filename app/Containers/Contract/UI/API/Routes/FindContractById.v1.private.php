<?php

/**
 * @apiGroup           Contract
 * @apiName            findContractById
 *
 * @api                {GET} /v1/contract/:id Endpoint title here..
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
$router->get('contract/{id}', [
    'as' => 'api_contract_find_contract_by_id',
    'uses'  => 'Controller@findContractById',
    'middleware' => [
      'auth:api',
    ],
]);
