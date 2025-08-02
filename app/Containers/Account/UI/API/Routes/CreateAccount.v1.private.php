<?php

/**
 * @apiGroup           Account
 * @apiName            createAccount
 *
 * @api                {POST} /v1/account Endpoint title here..
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
$router->post('account', [
    'as' => 'api_account_create_account',
    'uses'  => 'Controller@createAccount',
    'middleware' => [
      'auth:api',
    ],
]);
