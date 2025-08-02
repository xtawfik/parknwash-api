<?php

/**
 * @apiGroup           AccBalanceSheet
 * @apiName            createAccBalanceSheet
 *
 * @api                {POST} /v1/acc_balance_sheet Endpoint title here..
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
$router->post('acc_balance_sheet', [
    'as' => 'api_accbalancesheet_create_acc_balance_sheet',
    'uses'  => 'Controller@createAccBalanceSheet',
    'middleware' => [
      'auth:api',
    ],
]);
