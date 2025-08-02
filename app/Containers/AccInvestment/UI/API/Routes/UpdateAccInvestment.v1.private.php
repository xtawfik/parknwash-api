<?php

/**
 * @apiGroup           AccInvestment
 * @apiName            updateAccInvestment
 *
 * @api                {POST} /v1/acc_investment/:id Endpoint title here..
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
$router->post('acc_investment/{id}', [
    'as' => 'api_accinvestment_update_acc_investment',
    'uses'  => 'Controller@updateAccInvestment',
    'middleware' => [
      'auth:api',
    ],
]);
