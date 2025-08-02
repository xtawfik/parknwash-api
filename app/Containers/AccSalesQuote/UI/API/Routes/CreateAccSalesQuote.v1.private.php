<?php

/**
 * @apiGroup           AccSalesQuote
 * @apiName            createAccSalesQuote
 *
 * @api                {POST} /v1/acc_sales_quote Endpoint title here..
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
$router->post('acc_sales_quote', [
    'as' => 'api_accsalesquote_create_acc_sales_quote',
    'uses'  => 'Controller@createAccSalesQuote',
    'middleware' => [
      'auth:api',
    ],
]);
