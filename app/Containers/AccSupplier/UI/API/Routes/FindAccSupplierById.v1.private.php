<?php

/**
 * @apiGroup           AccSupplier
 * @apiName            findAccSupplierById
 *
 * @api                {GET} /v1/acc_supplier/:id Endpoint title here..
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
$router->get('acc_supplier/{id}', [
    'as' => 'api_accsupplier_find_acc_supplier_by_id',
    'uses'  => 'Controller@findAccSupplierById',
    'middleware' => [
      'auth:api',
    ],
]);
