<?php

/**
 * @apiGroup           AccCurrencyRevaluation
 * @apiName            deleteAccCurrencyRevaluation
 *
 * @api                {DELETE} /v1/acc_currency_revaluation/:id Endpoint title here..
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
$router->delete('acc_currency_revaluation/{id}', [
    'as' => 'api_acccurrencyrevaluation_delete_acc_currency_revaluation',
    'uses'  => 'Controller@deleteAccCurrencyRevaluation',
    'middleware' => [
      'auth:api',
    ],
]);
