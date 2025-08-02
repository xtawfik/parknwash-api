<?php

/**
 * @apiGroup           PaymentMethod
 * @apiName            getAllPaymentMethods
 *
 * @api                {GET} /v1/payment_method Endpoint title here..
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
$router->get('payment_method', [
    'as' => 'api_paymentmethod_get_all_payment_methods',
    'uses'  => 'Controller@getAllPaymentMethods',
    'middleware' => [
      'auth:api',
    ],
]);
