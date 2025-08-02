<?php

/**
 * @apiGroup           AccCurrencyExchangeTransaction
 * @apiName            findAccCurrencyExchangeTransactionById
 *
 * @api                {GET} /v1/acc_currency_exchange_transaction/:id Endpoint title here..
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
$router->get('acc_currency_exchange_transaction/{id}', [
    'as' => 'api_acccurrencyexchangetransaction_find_acc_currency_exchange_transaction_by_id',
    'uses'  => 'Controller@findAccCurrencyExchangeTransactionById',
    'middleware' => [
      'auth:api',
    ],
]);
