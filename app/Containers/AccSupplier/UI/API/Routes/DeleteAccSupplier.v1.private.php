<?php

/**
 * @apiGroup           AccSupplier
 * @apiName            deleteAccSupplier
 *
 * @api                {DELETE} /v1/acc_supplier/:id Endpoint title here..
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
$router->delete('acc_supplier/{id}', [
    'as' => 'api_accsupplier_delete_acc_supplier',
    'uses'  => 'Controller@deleteAccSupplier',
    'middleware' => [
      'auth:api',
    ],
]);
