<?php

/**
 * @apiGroup           AccWithholdingTaxReceipt
 * @apiName            findAccWithholdingTaxReceiptById
 *
 * @api                {GET} /v1/acc_withholding_tax_receipt/:id Endpoint title here..
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
$router->get('acc_withholding_tax_receipt/{id}', [
    'as' => 'api_accwithholdingtaxreceipt_find_acc_withholding_tax_receipt_by_id',
    'uses'  => 'Controller@findAccWithholdingTaxReceiptById',
    'middleware' => [
      'auth:api',
    ],
]);
