<?php

/**
 * @apiGroup           AccCustomer
 * @apiName            getAllAccCustomers
 *
 * @api                {GET} /v1/acc_customer Endpoint title here..
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
$router->get('acc_customer', [
    'as' => 'api_acccustomer_get_all_acc_customers',
    'uses'  => 'Controller@getAllAccCustomers',
    'middleware' => [
      'auth:api',
    ],
]);
