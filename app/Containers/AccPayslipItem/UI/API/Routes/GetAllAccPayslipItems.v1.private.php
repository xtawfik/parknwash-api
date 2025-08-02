<?php

/**
 * @apiGroup           AccPayslipItem
 * @apiName            getAllAccPayslipItems
 *
 * @api                {GET} /v1/acc_payslip_item Endpoint title here..
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
$router->get('acc_payslip_item', [
    'as' => 'api_accpayslipitem_get_all_acc_payslip_items',
    'uses'  => 'Controller@getAllAccPayslipItems',
    'middleware' => [
      'auth:api',
    ],
]);
