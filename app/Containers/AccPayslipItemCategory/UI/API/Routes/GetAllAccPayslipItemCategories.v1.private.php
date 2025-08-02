<?php

/**
 * @apiGroup           AccPayslipItemCategory
 * @apiName            getAllAccPayslipItemCategories
 *
 * @api                {GET} /v1/acc_payslip_item_category Endpoint title here..
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
$router->get('acc_payslip_item_category', [
    'as' => 'api_accpayslipitemcategory_get_all_acc_payslip_item_categories',
    'uses'  => 'Controller@getAllAccPayslipItemCategories',
    'middleware' => [
      'auth:api',
    ],
]);
