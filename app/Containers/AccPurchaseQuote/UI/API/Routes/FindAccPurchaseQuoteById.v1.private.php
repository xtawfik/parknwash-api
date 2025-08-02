<?php

/**
 * @apiGroup           AccPurchaseQuote
 * @apiName            findAccPurchaseQuoteById
 *
 * @api                {GET} /v1/acc_purchase_quote/:id Endpoint title here..
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
$router->get('acc_purchase_quote/{id}', [
    'as' => 'api_accpurchasequote_find_acc_purchase_quote_by_id',
    'uses'  => 'Controller@findAccPurchaseQuoteById',
    'middleware' => [
      'auth:api',
    ],
]);
