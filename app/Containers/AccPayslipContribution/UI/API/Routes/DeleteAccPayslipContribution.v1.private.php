<?php

/**
 * @apiGroup           AccPayslipContribution
 * @apiName            deleteAccPayslipContribution
 *
 * @api                {DELETE} /v1/acc_payslip_contribution/:id Endpoint title here..
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
$router->delete('acc_payslip_contribution/{id}', [
    'as' => 'api_accpayslipcontribution_delete_acc_payslip_contribution',
    'uses'  => 'Controller@deleteAccPayslipContribution',
    'middleware' => [
      'auth:api',
    ],
]);
