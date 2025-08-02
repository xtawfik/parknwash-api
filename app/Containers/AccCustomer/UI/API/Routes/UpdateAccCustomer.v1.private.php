<?php

/**
 * @apiGroup           AccCustomer
 * @apiName            updateAccCustomer
 *
 * @api                {POST} /v1/acc_customer/:id Endpoint title here..
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
$router->post('acc_customer/{id}', [
    'as' => 'api_acccustomer_update_acc_customer',
    'uses'  => 'Controller@updateAccCustomer',
    'middleware' => [
      'auth:api',
    ],
]);
