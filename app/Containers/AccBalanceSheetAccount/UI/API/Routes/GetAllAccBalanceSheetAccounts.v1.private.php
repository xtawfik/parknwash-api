<?php

/**
 * @apiGroup           AccBalanceSheetAccount
 * @apiName            getAllAccBalanceSheetAccounts
 *
 * @api                {GET} /v1/acc_balance_sheet_account Endpoint title here..
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
$router->get('acc_balance_sheet_account', [
    'as' => 'api_accbalancesheetaccount_get_all_acc_balance_sheet_accounts',
    'uses'  => 'Controller@getAllAccBalanceSheetAccounts',
    'middleware' => [
      'auth:api',
    ],
]);
