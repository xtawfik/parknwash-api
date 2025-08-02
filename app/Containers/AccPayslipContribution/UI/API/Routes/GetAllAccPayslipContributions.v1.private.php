<?php

/**
 * @apiGroup           AccPayslipContribution
 * @apiName            getAllAccPayslipContributions
 *
 * @api                {GET} /v1/acc_payslip_contribution Endpoint title here..
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
$router->get('acc_payslip_contribution', [
    'as' => 'api_accpayslipcontribution_get_all_acc_payslip_contributions',
    'uses'  => 'Controller@getAllAccPayslipContributions',
    'middleware' => [
      'auth:api',
    ],
]);
