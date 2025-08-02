<?php

/**
 * @apiGroup           AccCurrency
 * @apiName            findAccCurrencyById
 *
 * @api                {GET} /v1/acc_currency/:id Endpoint title here..
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
$router->get('acc_currency/{id}', [
    'as' => 'api_acccurrency_find_acc_currency_by_id',
    'uses'  => 'Controller@findAccCurrencyById',
    'middleware' => [
      'auth:api',
    ],
]);
