<?php

/**
 * @apiGroup           AccSalesOrder
 * @apiName            updateAccSalesOrder
 *
 * @api                {POST} /v1/acc_sales_order/:id Endpoint title here..
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
$router->post('acc_sales_order/{id}', [
    'as' => 'api_accsalesorder_update_acc_sales_order',
    'uses'  => 'Controller@updateAccSalesOrder',
    'middleware' => [
      'auth:api',
    ],
]);
