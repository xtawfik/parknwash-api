<?php

/**
 * @apiGroup           AccCurrencyExchangeTransaction
 * @apiName            getAllAccCurrencyExchangeTransactions
 *
 * @api                {GET} /v1/acc_currency_exchange_transaction Endpoint title here..
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
$router->get('acc_currency_exchange_transaction', [
    'as' => 'api_acccurrencyexchangetransaction_get_all_acc_currency_exchange_transactions',
    'uses'  => 'Controller@getAllAccCurrencyExchangeTransactions',
    'middleware' => [
      'auth:api',
    ],
]);
