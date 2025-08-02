<?php

/**
 * @apiGroup           Transaction
 * @apiName            updateTransaction
 *
 * @api                {POST} /v1/transaction/:id Endpoint title here..
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
$router->post('transaction/{id}', [
    'as' => 'api_transaction_update_transaction',
    'uses'  => 'Controller@updateTransaction',
    'middleware' => [
      'auth:api',
    ],
]);
