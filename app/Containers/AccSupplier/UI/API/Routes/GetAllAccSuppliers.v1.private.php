<?php

/**
 * @apiGroup           AccSupplier
 * @apiName            getAllAccSuppliers
 *
 * @api                {GET} /v1/acc_supplier Endpoint title here..
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
$router->get('acc_supplier', [
    'as' => 'api_accsupplier_get_all_acc_suppliers',
    'uses'  => 'Controller@getAllAccSuppliers',
    'middleware' => [
      'auth:api',
    ],
]);
