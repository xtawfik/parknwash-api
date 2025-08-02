<?php

/**
 * @apiGroup           AccCurrencyRevaluationaItem
 * @apiName            getAllAccCurrencyRevaluationaItems
 *
 * @api                {GET} /v1/acc_currency_revaluationa_item Endpoint title here..
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
$router->get('acc_currency_revaluationa_item', [
    'as' => 'api_acccurrencyrevaluationaitem_get_all_acc_currency_revaluationa_items',
    'uses'  => 'Controller@getAllAccCurrencyRevaluationaItems',
    'middleware' => [
      'auth:api',
    ],
]);
