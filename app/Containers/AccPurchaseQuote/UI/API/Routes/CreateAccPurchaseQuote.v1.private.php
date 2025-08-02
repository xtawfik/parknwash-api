<?php

/**
 * @apiGroup           AccPurchaseQuote
 * @apiName            createAccPurchaseQuote
 *
 * @api                {POST} /v1/acc_purchase_quote Endpoint title here..
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
$router->post('acc_purchase_quote', [
    'as' => 'api_accpurchasequote_create_acc_purchase_quote',
    'uses'  => 'Controller@createAccPurchaseQuote',
    'middleware' => [
      'auth:api',
    ],
]);
