<?php

/**
 * @apiGroup           AccInvestmentRevaluation
 * @apiName            createAccInvestmentRevaluation
 *
 * @api                {POST} /v1/acc_investment_revaluation Endpoint title here..
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
$router->post('acc_investment_revaluation', [
    'as' => 'api_accinvestmentrevaluation_create_acc_investment_revaluation',
    'uses'  => 'Controller@createAccInvestmentRevaluation',
    'middleware' => [
      'auth:api',
    ],
]);
