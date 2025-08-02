<?php

/**
 * @apiGroup           AccBalanceSheetAccount
 * @apiName            findAccBalanceSheetAccountById
 *
 * @api                {GET} /v1/acc_balance_sheet_account/:id Endpoint title here..
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
$router->get('acc_balance_sheet_account/{id}', [
    'as' => 'api_accbalancesheetaccount_find_acc_balance_sheet_account_by_id',
    'uses'  => 'Controller@findAccBalanceSheetAccountById',
    'middleware' => [
      'auth:api',
    ],
]);
