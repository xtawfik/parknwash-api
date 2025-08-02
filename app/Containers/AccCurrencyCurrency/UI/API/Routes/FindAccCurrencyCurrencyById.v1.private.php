<?php

/**
 * @apiGroup           AccCurrencyCurrency
 * @apiName            findAccCurrencyCurrencyById
 *
 * @api                {GET} /v1/acc_currency_currency/:id Endpoint title here..
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
$router->get('acc_currency_currency/{id}', [
    'as' => 'api_acccurrencycurrency_find_acc_currency_currency_by_id',
    'uses'  => 'Controller@findAccCurrencyCurrencyById',
    'middleware' => [
      'auth:api',
    ],
]);
