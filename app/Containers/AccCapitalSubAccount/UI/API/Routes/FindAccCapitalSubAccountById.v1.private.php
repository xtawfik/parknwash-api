<?php

/**
 * @apiGroup           AccCapitalSubAccount
 * @apiName            findAccCapitalSubAccountById
 *
 * @api                {GET} /v1/acc_capital_sub_account/:id Endpoint title here..
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
$router->get('acc_capital_sub_account/{id}', [
    'as' => 'api_acccapitalsubaccount_find_acc_capital_sub_account_by_id',
    'uses'  => 'Controller@findAccCapitalSubAccountById',
    'middleware' => [
      'auth:api',
    ],
]);
