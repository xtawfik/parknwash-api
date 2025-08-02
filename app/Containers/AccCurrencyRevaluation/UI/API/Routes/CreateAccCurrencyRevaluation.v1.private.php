<?php

/**
 * @apiGroup           AccCurrencyRevaluation
 * @apiName            createAccCurrencyRevaluation
 *
 * @api                {POST} /v1/acc_currency_revaluation Endpoint title here..
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
$router->post('acc_currency_revaluation', [
    'as' => 'api_acccurrencyrevaluation_create_acc_currency_revaluation',
    'uses'  => 'Controller@createAccCurrencyRevaluation',
    'middleware' => [
      'auth:api',
    ],
]);
