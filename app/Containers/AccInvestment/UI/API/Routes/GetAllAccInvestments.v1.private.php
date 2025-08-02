<?php

/**
 * @apiGroup           AccInvestment
 * @apiName            getAllAccInvestments
 *
 * @api                {GET} /v1/acc_investment Endpoint title here..
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
$router->get('acc_investment', [
    'as' => 'api_accinvestment_get_all_acc_investments',
    'uses'  => 'Controller@getAllAccInvestments',
    'middleware' => [
      'auth:api',
    ],
]);
