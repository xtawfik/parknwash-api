<?php

/**
 * @apiGroup           AccCustomer
 * @apiName            findAccCustomerById
 *
 * @api                {GET} /v1/acc_customer/:id Endpoint title here..
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
$router->get('acc_customer/{id}', [
    'as' => 'api_acccustomer_find_acc_customer_by_id',
    'uses'  => 'Controller@findAccCustomerById',
    'middleware' => [
      'auth:api',
    ],
]);
