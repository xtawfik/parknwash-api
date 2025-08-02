<?php

/**
 * @apiGroup           AccWithholdingTaxReceipt
 * @apiName            deleteAccWithholdingTaxReceipt
 *
 * @api                {DELETE} /v1/acc_withholding_tax_receipt/:id Endpoint title here..
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
$router->delete('acc_withholding_tax_receipt/{id}', [
    'as' => 'api_accwithholdingtaxreceipt_delete_acc_withholding_tax_receipt',
    'uses'  => 'Controller@deleteAccWithholdingTaxReceipt',
    'middleware' => [
      'auth:api',
    ],
]);
