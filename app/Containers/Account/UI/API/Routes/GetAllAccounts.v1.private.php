<?php

/**
 * @apiGroup           Account
 * @apiName            getAllAccounts
 *
 * @api                {GET} /v1/account Endpoint title here..
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
$router->get('account', [
    'as' => 'api_account_get_all_accounts',
    'uses'  => 'Controller@getAllAccounts',
    'middleware' => [
//      'auth:api',
    ],
]);
