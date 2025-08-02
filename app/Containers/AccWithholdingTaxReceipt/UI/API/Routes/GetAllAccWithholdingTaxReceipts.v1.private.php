<?php

/**
 * @apiGroup           AccWithholdingTaxReceipt
 * @apiName            getAllAccWithholdingTaxReceipts
 *
 * @api                {GET} /v1/acc_withholding_tax_receipt Endpoint title here..
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
$router->get('acc_withholding_tax_receipt', [
    'as' => 'api_accwithholdingtaxreceipt_get_all_acc_withholding_tax_receipts',
    'uses'  => 'Controller@getAllAccWithholdingTaxReceipts',
    'middleware' => [
      'auth:api',
    ],
]);
