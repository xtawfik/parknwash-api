<?php

/**
 * @apiGroup           AccReceipt
 * @apiName            getAllAccReceipts
 *
 * @api                {GET} /v1/acc_receipt Endpoint title here..
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
$router->get('acc_receipt', [
    'as' => 'api_accreceipt_get_all_acc_receipts',
    'uses'  => 'Controller@getAllAccReceipts',
    'middleware' => [
      'auth:api',
    ],
]);
