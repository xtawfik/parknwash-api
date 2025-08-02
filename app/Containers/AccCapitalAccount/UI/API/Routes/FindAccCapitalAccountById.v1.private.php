<?php

/**
 * @apiGroup           AccCapitalAccount
 * @apiName            findAccCapitalAccountById
 *
 * @api                {GET} /v1/acc_capital_account/:id Endpoint title here..
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
$router->get('acc_capital_account/{id}', [
    'as' => 'api_acccapitalaccount_find_acc_capital_account_by_id',
    'uses'  => 'Controller@findAccCapitalAccountById',
    'middleware' => [
      'auth:api',
    ],
]);
