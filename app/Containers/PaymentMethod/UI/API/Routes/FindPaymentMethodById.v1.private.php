<?php

/**
 * @apiGroup           PaymentMethod
 * @apiName            findPaymentMethodById
 *
 * @api                {GET} /v1/payment_method/:id Endpoint title here..
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
$router->get('payment_method/{id}', [
    'as' => 'api_paymentmethod_find_payment_method_by_id',
    'uses'  => 'Controller@findPaymentMethodById',
    'middleware' => [
      'auth:api',
    ],
]);
