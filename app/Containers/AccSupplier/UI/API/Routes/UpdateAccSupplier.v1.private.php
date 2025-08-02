<?php

/**
 * @apiGroup           AccSupplier
 * @apiName            updateAccSupplier
 *
 * @api                {POST} /v1/acc_supplier/:id Endpoint title here..
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
$router->post('acc_supplier/{id}', [
    'as' => 'api_accsupplier_update_acc_supplier',
    'uses'  => 'Controller@updateAccSupplier',
    'middleware' => [
      'auth:api',
    ],
]);
