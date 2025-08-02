<?php

/**
 * @apiGroup           AccCurrencyExchange
 * @apiName            findAccCurrencyExchangeById
 *
 * @api                {GET} /v1/acc_currency_exchange/:id Endpoint title here..
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
$router->get('acc_currency_exchange/{id}', [
    'as' => 'api_acccurrencyexchange_find_acc_currency_exchange_by_id',
    'uses'  => 'Controller@findAccCurrencyExchangeById',
    'middleware' => [
      'auth:api',
    ],
]);
