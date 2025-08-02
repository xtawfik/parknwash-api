<?php

/**
 * @apiGroup           AccSalesQuote
 * @apiName            deleteAccSalesQuote
 *
 * @api                {DELETE} /v1/acc_sales_quote/:id Endpoint title here..
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
$router->delete('acc_sales_quote/{id}', [
    'as' => 'api_accsalesquote_delete_acc_sales_quote',
    'uses'  => 'Controller@deleteAccSalesQuote',
    'middleware' => [
      'auth:api',
    ],
]);
