<?php

/**
 * @apiGroup           AccSalesQuote
 * @apiName            updateAccSalesQuote
 *
 * @api                {POST} /v1/acc_sales_quote/:id Endpoint title here..
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
$router->post('acc_sales_quote/{id}', [
    'as' => 'api_accsalesquote_update_acc_sales_quote',
    'uses'  => 'Controller@updateAccSalesQuote',
    'middleware' => [
      'auth:api',
    ],
]);
