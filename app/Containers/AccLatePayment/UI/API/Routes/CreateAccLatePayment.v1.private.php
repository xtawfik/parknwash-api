<?php

/**
 * @apiGroup           AccLatePayment
 * @apiName            createAccLatePayment
 *
 * @api                {POST} /v1/acc_late_payment Endpoint title here..
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
$router->post('acc_late_payment', [
    'as' => 'api_acclatepayment_create_acc_late_payment',
    'uses'  => 'Controller@createAccLatePayment',
    'middleware' => [
      'auth:api',
    ],
]);
