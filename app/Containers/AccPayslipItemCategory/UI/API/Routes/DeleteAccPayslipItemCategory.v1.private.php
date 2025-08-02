<?php

/**
 * @apiGroup           AccPayslipItemCategory
 * @apiName            deleteAccPayslipItemCategory
 *
 * @api                {DELETE} /v1/acc_payslip_item_category/:id Endpoint title here..
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
$router->delete('acc_payslip_item_category/{id}', [
    'as' => 'api_accpayslipitemcategory_delete_acc_payslip_item_category',
    'uses'  => 'Controller@deleteAccPayslipItemCategory',
    'middleware' => [
      'auth:api',
    ],
]);
