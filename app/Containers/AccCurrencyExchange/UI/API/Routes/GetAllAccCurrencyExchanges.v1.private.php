<?php

/**
 * @apiGroup           AccCurrencyExchange
 * @apiName            getAllAccCurrencyExchanges
 *
 * @api                {GET} /v1/acc_currency_exchange Endpoint title here..
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
$router->get('acc_currency_exchange', [
    'as' => 'api_acccurrencyexchange_get_all_acc_currency_exchanges',
    'uses'  => 'Controller@getAllAccCurrencyExchanges',
    'middleware' => [
      'auth:api',
    ],
]);
