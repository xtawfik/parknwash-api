<?php

/**
 * @apiGroup           AccCapitalAccount
 * @apiName            deleteAccCapitalAccount
 *
 * @api                {DELETE} /v1/acc_capital_account/:id Endpoint title here..
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
$router->delete('acc_capital_account/{id}', [
    'as' => 'api_acccapitalaccount_delete_acc_capital_account',
    'uses'  => 'Controller@deleteAccCapitalAccount',
    'middleware' => [
      'auth:api',
    ],
]);
