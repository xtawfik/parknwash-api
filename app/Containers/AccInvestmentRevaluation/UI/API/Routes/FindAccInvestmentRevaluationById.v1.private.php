<?php

/**
 * @apiGroup           AccInvestmentRevaluation
 * @apiName            findAccInvestmentRevaluationById
 *
 * @api                {GET} /v1/acc_investment_revaluation/:id Endpoint title here..
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
$router->get('acc_investment_revaluation/{id}', [
    'as' => 'api_accinvestmentrevaluation_find_acc_investment_revaluation_by_id',
    'uses'  => 'Controller@findAccInvestmentRevaluationById',
    'middleware' => [
      'auth:api',
    ],
]);
