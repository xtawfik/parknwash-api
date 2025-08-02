<?php

/**
 * @apiGroup           AccCurrencyRevaluation
 * @apiName            getAllAccCurrencyRevaluations
 *
 * @api                {GET} /v1/acc_currency_revaluation Endpoint title here..
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
$router->get('acc_currency_revaluation', [
    'as' => 'api_acccurrencyrevaluation_get_all_acc_currency_revaluations',
    'uses'  => 'Controller@getAllAccCurrencyRevaluations',
    'middleware' => [
      'auth:api',
    ],
]);
