<?php

/**
 * @apiGroup           AccPurchaseQuote
 * @apiName            getAllAccPurchaseQuotes
 *
 * @api                {GET} /v1/acc_purchase_quote Endpoint title here..
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
$router->get('acc_purchase_quote', [
    'as' => 'api_accpurchasequote_get_all_acc_purchase_quotes',
    'uses'  => 'Controller@getAllAccPurchaseQuotes',
    'middleware' => [
      'auth:api',
    ],
]);
