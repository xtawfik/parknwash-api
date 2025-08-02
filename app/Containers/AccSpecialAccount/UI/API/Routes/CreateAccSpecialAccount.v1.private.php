<?php

/**
 * @apiGroup           AccSpecialAccount
 * @apiName            createAccSpecialAccount
 *
 * @api                {POST} /v1/acc_special_account Endpoint title here..
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
$router->post('acc_special_account', [
    'as' => 'api_accspecialaccount_create_acc_special_account',
    'uses'  => 'Controller@createAccSpecialAccount',
    'middleware' => [
      'auth:api',
    ],
]);
