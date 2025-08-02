<?php

/**
 * @apiGroup           AccLatePayment
 * @apiName            getAllAccLatePayments
 *
 * @api                {GET} /v1/acc_late_payment Endpoint title here..
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
$router->get('acc_late_payment', [
    'as' => 'api_acclatepayment_get_all_acc_late_payments',
    'uses'  => 'Controller@getAllAccLatePayments',
    'middleware' => [
      'auth:api',
    ],
]);
