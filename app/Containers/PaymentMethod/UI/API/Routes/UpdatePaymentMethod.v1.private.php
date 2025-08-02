<?php

/**
 * @apiGroup           PaymentMethod
 * @apiName            updatePaymentMethod
 *
 * @api                {POST} /v1/payment_method/:id Endpoint title here..
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
$router->post('payment_method/{id}', [
    'as' => 'api_paymentmethod_update_payment_method',
    'uses'  => 'Controller@updatePaymentMethod',
    'middleware' => [
      'auth:api',
    ],
]);
