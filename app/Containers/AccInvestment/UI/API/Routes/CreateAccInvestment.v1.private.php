<?php

/**
 * @apiGroup           AccInvestment
 * @apiName            createAccInvestment
 *
 * @api                {POST} /v1/acc_investment Endpoint title here..
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
$router->post('acc_investment', [
    'as' => 'api_accinvestment_create_acc_investment',
    'uses'  => 'Controller@createAccInvestment',
    'middleware' => [
      'auth:api',
    ],
]);
