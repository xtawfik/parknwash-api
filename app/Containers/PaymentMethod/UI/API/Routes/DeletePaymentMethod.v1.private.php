<?php

/**
 * @apiGroup           PaymentMethod
 * @apiName            deletePaymentMethod
 *
 * @api                {DELETE} /v1/payment_method/:id Endpoint title here..
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
$router->delete('payment_method/{id}', [
    'as' => 'api_paymentmethod_delete_payment_method',
    'uses'  => 'Controller@deletePaymentMethod',
    'middleware' => [
      'auth:api',
    ],
]);
