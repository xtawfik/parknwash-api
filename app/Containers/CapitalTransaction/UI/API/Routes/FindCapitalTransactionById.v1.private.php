<?php

/**
 * @apiGroup           CapitalTransaction
 * @apiName            findCapitalTransactionById
 *
 * @api                {GET} /v1/capital_transaction/:id Endpoint title here..
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
$router->get('capital_transaction/{id}', [
    'as' => 'api_capitaltransaction_find_capital_transaction_by_id',
    'uses'  => 'Controller@findCapitalTransactionById',
    'middleware' => [
      'auth:api',
    ],
]);
