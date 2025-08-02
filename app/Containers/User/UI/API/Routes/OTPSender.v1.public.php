<?php

/**
 * @apiGroup           User
 * @apiName            sendOtpCode
 *
 * @api                {POST} /v1/otp/send Endpoint title here..
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
$router->post('otp/send', [
    'as' => 'api_user_send_otp_code',
    'uses'  => 'Controller@sendOtpCode',
    'middleware' => [
//      'auth:api',
    ],
]);

$router->get('otp/send', [
    'as' => 'api_user_send_otp_code',
    'uses'  => 'Controller@sendOtpCode',
    'middleware' => [
//      'auth:api',
    ],
]);
