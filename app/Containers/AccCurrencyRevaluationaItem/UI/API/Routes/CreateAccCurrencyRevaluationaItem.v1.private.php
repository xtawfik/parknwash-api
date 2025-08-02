<?php

/**
 * @apiGroup           AccCurrencyRevaluationaItem
 * @apiName            createAccCurrencyRevaluationaItem
 *
 * @api                {POST} /v1/acc_currency_revaluationa_item Endpoint title here..
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
$router->post('acc_currency_revaluationa_item', [
    'as' => 'api_acccurrencyrevaluationaitem_create_acc_currency_revaluationa_item',
    'uses'  => 'Controller@createAccCurrencyRevaluationaItem',
    'middleware' => [
      'auth:api',
    ],
]);
