<?php

/**
 * @apiGroup           AccPayment
 * @apiName            updateAccPayment
 *
 * @api                {POST} /v1/acc_payment/:id Endpoint title here..
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
$router->post('acc_payment/{id}', [
    'as' => 'api_accpayment_update_acc_payment',
    'uses'  => 'Controller@updateAccPayment',
    'middleware' => [
      'auth:api',
    ],
]);
