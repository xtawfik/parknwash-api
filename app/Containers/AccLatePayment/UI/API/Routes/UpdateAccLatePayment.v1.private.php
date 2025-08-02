<?php

/**
 * @apiGroup           AccLatePayment
 * @apiName            updateAccLatePayment
 *
 * @api                {POST} /v1/acc_late_payment/:id Endpoint title here..
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
$router->post('acc_late_payment/{id}', [
    'as' => 'api_acclatepayment_update_acc_late_payment',
    'uses'  => 'Controller@updateAccLatePayment',
    'middleware' => [
      'auth:api',
    ],
]);
