<?php

/**
 * @apiGroup           AccCurrencyExchange
 * @apiName            deleteAccCurrencyExchange
 *
 * @api                {DELETE} /v1/acc_currency_exchange/:id Endpoint title here..
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
$router->delete('acc_currency_exchange/{id}', [
    'as' => 'api_acccurrencyexchange_delete_acc_currency_exchange',
    'uses'  => 'Controller@deleteAccCurrencyExchange',
    'middleware' => [
      'auth:api',
    ],
]);
