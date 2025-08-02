<?php

/**
 * @apiGroup           AccCurrencyCurrency
 * @apiName            deleteAccCurrencyCurrency
 *
 * @api                {DELETE} /v1/acc_currency_currency/:id Endpoint title here..
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
$router->delete('acc_currency_currency/{id}', [
    'as' => 'api_acccurrencycurrency_delete_acc_currency_currency',
    'uses'  => 'Controller@deleteAccCurrencyCurrency',
    'middleware' => [
      'auth:api',
    ],
]);
