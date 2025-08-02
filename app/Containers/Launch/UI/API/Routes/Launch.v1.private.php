<?php

/**
 * @apiGroup           Lawyers
 * @apiName            createLawyers
 *
 * @api                {POST} /v1/lawyers Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
 * {
 * // Insert the response of the request here...
 * }
 */

/** @var Route $router */
$router->get('launch', [
  'as' => 'api_launch',
  'uses' => 'Controller@launch',
]);

$router->get('employee-image', [
  'as' => 'api_launch_employee_image',
  'uses' => 'Controller@getEmployeeImageUrl',
]);

$router->get('otp', [
  'as' => 'api_launch',
  'uses' => 'Controller@otp',
]);

$router->get('userdata', [
  'as' => 'api_launch_userdata',
  'uses' => 'Controller@userdata',
  'middleware' => [
    'auth:api',
  ],
]);

$router->get('dashboard', [
  'as' => 'api_dashboard',
  'uses' => 'Controller@dashboard',
]);

$router->get('dropdowns', [
  'as' => 'api_dropdowns',
  'uses' => 'Controller@dropdowns',
]);

$router->get('payment/confirm', [
  'as' => 'api_launch_confirm',
  'uses' => 'Controller@payment',
]);

$router->get('check-permission', [
  'as' => 'api_launch_check_permission',
  'uses' => 'Controller@checkPermissions',
  'middleware' => [
    'auth:api',
  ],
]);


//$router->get('notifications', [
//    'as' => 'api_launch_notifications',
//    'uses'  => 'Controller@notifications',
//]);

$router->post('contact', [
  'as' => 'api_launch_contact',
  'uses' => 'Controller@contact',
]);


$router->post('password-reset', [
  'as' => 'api_launch_reset_password',
  'uses' => 'Controller@resetPassword',
]);


$router->post('verification-code', [
  'as' => 'api_launch_verification_code',
  'uses' => 'Controller@verificationCode',
]);
