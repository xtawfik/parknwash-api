<?php

/**
 * @apiGroup           AccSalesQuote
 * @apiName            getAllAccSalesQuotes
 *
 * @api                {GET} /v1/acc_sales_quote Endpoint title here..
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
$router->get('acc_sales_quote', [
    'as' => 'api_accsalesquote_get_all_acc_sales_quotes',
    'uses'  => 'Controller@getAllAccSalesQuotes',
    'middleware' => [
      'auth:api',
    ],
]);
