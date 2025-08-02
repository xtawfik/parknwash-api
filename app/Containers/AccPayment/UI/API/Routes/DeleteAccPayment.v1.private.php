<?php

/**
 * @apiGroup           AccPayment
 * @apiName            deleteAccPayment
 *
 * @api                {DELETE} /v1/acc_payment/:id Endpoint title here..
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
$router->delete('acc_payment/{id}', [
    'as' => 'api_accpayment_delete_acc_payment',
    'uses'  => 'Controller@deleteAccPayment',
    'middleware' => [
      'auth:api',
    ],
]);
