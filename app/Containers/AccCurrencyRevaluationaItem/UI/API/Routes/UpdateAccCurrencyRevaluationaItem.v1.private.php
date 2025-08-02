<?php

/**
 * @apiGroup           AccCurrencyRevaluationaItem
 * @apiName            updateAccCurrencyRevaluationaItem
 *
 * @api                {POST} /v1/acc_currency_revaluationa_item/:id Endpoint title here..
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
$router->post('acc_currency_revaluationa_item/{id}', [
    'as' => 'api_acccurrencyrevaluationaitem_update_acc_currency_revaluationa_item',
    'uses'  => 'Controller@updateAccCurrencyRevaluationaItem',
    'middleware' => [
      'auth:api',
    ],
]);
