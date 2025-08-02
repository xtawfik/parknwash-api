<?php

/**
 * @apiGroup           AccInvestmentRevaluationItem
 * @apiName            findAccInvestmentRevaluationItemById
 *
 * @api                {GET} /v1/acc_investment_revaluation_item/:id Endpoint title here..
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
$router->get('acc_investment_revaluation_item/{id}', [
    'as' => 'api_accinvestmentrevaluationitem_find_acc_investment_revaluation_item_by_id',
    'uses'  => 'Controller@findAccInvestmentRevaluationItemById',
    'middleware' => [
      'auth:api',
    ],
]);
