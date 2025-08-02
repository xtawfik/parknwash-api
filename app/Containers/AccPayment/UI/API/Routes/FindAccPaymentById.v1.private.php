<?php

/**
 * @apiGroup           AccPayment
 * @apiName            findAccPaymentById
 *
 * @api                {GET} /v1/acc_payment/:id Endpoint title here..
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
$router->get('acc_payment/{id}', [
    'as' => 'api_accpayment_find_acc_payment_by_id',
    'uses'  => 'Controller@findAccPaymentById',
    'middleware' => [
      'auth:api',
    ],
]);
