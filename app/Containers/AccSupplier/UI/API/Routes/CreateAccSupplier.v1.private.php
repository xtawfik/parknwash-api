<?php

/**
 * @apiGroup           AccSupplier
 * @apiName            createAccSupplier
 *
 * @api                {POST} /v1/acc_supplier Endpoint title here..
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
$router->post('acc_supplier', [
    'as' => 'api_accsupplier_create_acc_supplier',
    'uses'  => 'Controller@createAccSupplier',
    'middleware' => [
      'auth:api',
    ],
]);
