<?php

/**
 * @apiGroup           AccInvestment
 * @apiName            findAccInvestmentById
 *
 * @api                {GET} /v1/acc_investment/:id Endpoint title here..
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
$router->get('acc_investment/{id}', [
    'as' => 'api_accinvestment_find_acc_investment_by_id',
    'uses'  => 'Controller@findAccInvestmentById',
    'middleware' => [
      'auth:api',
    ],
]);
