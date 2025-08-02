<?php

/**
 * @apiGroup           AccCurrencyCurrency
 * @apiName            getAllAccCurrencyCurrencies
 *
 * @api                {GET} /v1/acc_currency_currency Endpoint title here..
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
$router->get('acc_currency_currency', [
    'as' => 'api_acccurrencycurrency_get_all_acc_currency_currencies',
    'uses'  => 'Controller@getAllAccCurrencyCurrencies',
    'middleware' => [
      'auth:api',
    ],
]);
