<?php

/**
 * @apiGroup           PaymentMethod
 * @apiName            createPaymentMethod
 *
 * @api                {POST} /v1/payment_method Endpoint title here..
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
$router->post('payment_method', [
    'as' => 'api_paymentmethod_create_payment_method',
    'uses'  => 'Controller@createPaymentMethod',
    'middleware' => [
      'auth:api',
    ],
]);
