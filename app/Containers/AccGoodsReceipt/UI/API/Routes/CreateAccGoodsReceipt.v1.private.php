<?php

/**
 * @apiGroup           AccGoodsReceipt
 * @apiName            createAccGoodsReceipt
 *
 * @api                {POST} /v1/acc_goods_receipt Endpoint title here..
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
$router->post('acc_goods_receipt', [
    'as' => 'api_accgoodsreceipt_create_acc_goods_receipt',
    'uses'  => 'Controller@createAccGoodsReceipt',
    'middleware' => [
      'auth:api',
    ],
]);
