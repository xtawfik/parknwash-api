<?php

/**
 * @apiGroup           CapitalTransaction
 * @apiName            getAllCapitalTransactions
 *
 * @api                {GET} /v1/capital_transaction Endpoint title here..
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
$router->get('capital_transaction', [
    'as' => 'api_capitaltransaction_get_all_capital_transactions',
    'uses'  => 'Controller@getAllCapitalTransactions',
    'middleware' => [
      'auth:api',
    ],
]);
