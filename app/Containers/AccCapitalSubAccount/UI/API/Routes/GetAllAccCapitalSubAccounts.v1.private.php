<?php

/**
 * @apiGroup           AccCapitalSubAccount
 * @apiName            getAllAccCapitalSubAccounts
 *
 * @api                {GET} /v1/acc_capital_sub_account Endpoint title here..
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
$router->get('acc_capital_sub_account', [
    'as' => 'api_acccapitalsubaccount_get_all_acc_capital_sub_accounts',
    'uses'  => 'Controller@getAllAccCapitalSubAccounts',
    'middleware' => [
      'auth:api',
    ],
]);
