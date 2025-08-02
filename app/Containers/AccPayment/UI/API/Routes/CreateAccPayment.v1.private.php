<?php

/**
 * @apiGroup           AccPayment
 * @apiName            createAccPayment
 *
 * @api                {POST} /v1/acc_payment Endpoint title here..
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
$router->post('acc_payment', [
    'as' => 'api_accpayment_create_acc_payment',
    'uses'  => 'Controller@createAccPayment',
    'middleware' => [
      'auth:api',
    ],
]);
