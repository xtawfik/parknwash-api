<?php

/**
 * @apiGroup           Bank
 * @apiName            findBankById
 *
 * @api                {GET} /v1/bank/:id Endpoint title here..
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
$router->get('bank/{id}', [
    'as' => 'api_bank_find_bank_by_id',
    'uses'  => 'Controller@findBankById',
    'middleware' => [
      'auth:api',
    ],
]);
