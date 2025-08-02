<?php

/**
 * @apiGroup           AccCustomer
 * @apiName            deleteAccCustomer
 *
 * @api                {DELETE} /v1/acc_customer/:id Endpoint title here..
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
$router->delete('acc_customer/{id}', [
    'as' => 'api_acccustomer_delete_acc_customer',
    'uses'  => 'Controller@deleteAccCustomer',
    'middleware' => [
      'auth:api',
    ],
]);
