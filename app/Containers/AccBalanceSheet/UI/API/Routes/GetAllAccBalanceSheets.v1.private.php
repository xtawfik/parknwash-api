<?php

/**
 * @apiGroup           AccBalanceSheet
 * @apiName            getAllAccBalanceSheets
 *
 * @api                {GET} /v1/acc_balance_sheet Endpoint title here..
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
$router->get('acc_balance_sheet', [
    'as' => 'api_accbalancesheet_get_all_acc_balance_sheets',
    'uses'  => 'Controller@getAllAccBalanceSheets',
    'middleware' => [
      'auth:api',
    ],
]);
