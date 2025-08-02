<?php

/**
 * @apiGroup           AccInvestment
 * @apiName            deleteAccInvestment
 *
 * @api                {DELETE} /v1/acc_investment/:id Endpoint title here..
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
$router->delete('acc_investment/{id}', [
    'as' => 'api_accinvestment_delete_acc_investment',
    'uses'  => 'Controller@deleteAccInvestment',
    'middleware' => [
      'auth:api',
    ],
]);
