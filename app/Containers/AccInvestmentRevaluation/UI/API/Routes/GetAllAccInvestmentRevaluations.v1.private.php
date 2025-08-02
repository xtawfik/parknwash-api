<?php

/**
 * @apiGroup           AccInvestmentRevaluation
 * @apiName            getAllAccInvestmentRevaluations
 *
 * @api                {GET} /v1/acc_investment_revaluation Endpoint title here..
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
$router->get('acc_investment_revaluation', [
    'as' => 'api_accinvestmentrevaluation_get_all_acc_investment_revaluations',
    'uses'  => 'Controller@getAllAccInvestmentRevaluations',
    'middleware' => [
      'auth:api',
    ],
]);
