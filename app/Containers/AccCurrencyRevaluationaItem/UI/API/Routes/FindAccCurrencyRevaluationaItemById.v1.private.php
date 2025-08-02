<?php

/**
 * @apiGroup           AccCurrencyRevaluationaItem
 * @apiName            findAccCurrencyRevaluationaItemById
 *
 * @api                {GET} /v1/acc_currency_revaluationa_item/:id Endpoint title here..
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
$router->get('acc_currency_revaluationa_item/{id}', [
    'as' => 'api_acccurrencyrevaluationaitem_find_acc_currency_revaluationa_item_by_id',
    'uses'  => 'Controller@findAccCurrencyRevaluationaItemById',
    'middleware' => [
      'auth:api',
    ],
]);
