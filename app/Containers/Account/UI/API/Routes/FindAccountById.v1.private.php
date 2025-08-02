<?php

/**
 * @apiGroup           Account
 * @apiName            findAccountById
 *
 * @api                {GET} /v1/account/:id Endpoint title here..
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
$router->get('account/{id}', [
    'as' => 'api_account_find_account_by_id',
    'uses'  => 'Controller@findAccountById',
    'middleware' => [
      'auth:api',
    ],
]);
