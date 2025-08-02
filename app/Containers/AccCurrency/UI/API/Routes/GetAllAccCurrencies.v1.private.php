<?php

/**
 * @apiGroup           AccCurrency
 * @apiName            getAllAccCurrencies
 *
 * @api                {GET} /v1/acc_currency Endpoint title here..
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
$router->get('acc_currency', [
    'as' => 'api_acccurrency_get_all_acc_currencies',
    'uses'  => 'Controller@getAllAccCurrencies',
    'middleware' => [
      'auth:api',
    ],
]);
