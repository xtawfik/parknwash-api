<?php

/**
 * @apiGroup           AccGoodsReceipt
 * @apiName            getAllAccGoodsReceipts
 *
 * @api                {GET} /v1/acc_goods_receipt Endpoint title here..
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
$router->get('acc_goods_receipt', [
    'as' => 'api_accgoodsreceipt_get_all_acc_goods_receipts',
    'uses'  => 'Controller@getAllAccGoodsReceipts',
    'middleware' => [
      'auth:api',
    ],
]);
