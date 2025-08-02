<?php

/**
 * @apiGroup           Account
 * @apiName            deleteAccount
 *
 * @api                {DELETE} /v1/account/:id Endpoint title here..
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
$router->delete('account/{id}', [
    'as' => 'api_account_delete_account',
    'uses'  => 'Controller@deleteAccount',
    'middleware' => [
      'auth:api',
    ],
]);
