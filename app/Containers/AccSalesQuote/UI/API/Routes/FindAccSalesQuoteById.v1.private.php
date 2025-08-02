<?php

/**
 * @apiGroup           AccSalesQuote
 * @apiName            findAccSalesQuoteById
 *
 * @api                {GET} /v1/acc_sales_quote/:id Endpoint title here..
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
$router->get('acc_sales_quote/{id}', [
    'as' => 'api_accsalesquote_find_acc_sales_quote_by_id',
    'uses'  => 'Controller@findAccSalesQuoteById',
    'middleware' => [
      'auth:api',
    ],
]);
