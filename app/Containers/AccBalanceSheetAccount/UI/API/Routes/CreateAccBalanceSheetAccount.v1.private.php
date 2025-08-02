<?php

/**
 * @apiGroup           AccBalanceSheetAccount
 * @apiName            createAccBalanceSheetAccount
 *
 * @api                {POST} /v1/acc_balance_sheet_account Endpoint title here..
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
$router->post('acc_balance_sheet_account', [
    'as' => 'api_accbalancesheetaccount_create_acc_balance_sheet_account',
    'uses'  => 'Controller@createAccBalanceSheetAccount',
    'middleware' => [
      'auth:api',
    ],
]);
