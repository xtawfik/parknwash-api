<?php

/**
 * @apiGroup           AccInvestmentRevaluationItem
 * @apiName            getAllAccInvestmentRevaluationItems
 *
 * @api                {GET} /v1/acc_investment_revaluation_item Endpoint title here..
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
$router->get('acc_investment_revaluation_item', [
    'as' => 'api_accinvestmentrevaluationitem_get_all_acc_investment_revaluation_items',
    'uses'  => 'Controller@getAllAccInvestmentRevaluationItems',
    'middleware' => [
      'auth:api',
    ],
]);
