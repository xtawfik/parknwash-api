<?php

/**
 * @apiGroup           AccLatePayment
 * @apiName            findAccLatePaymentById
 *
 * @api                {GET} /v1/acc_late_payment/:id Endpoint title here..
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
$router->get('acc_late_payment/{id}', [
    'as' => 'api_acclatepayment_find_acc_late_payment_by_id',
    'uses'  => 'Controller@findAccLatePaymentById',
    'middleware' => [
      'auth:api',
    ],
]);
