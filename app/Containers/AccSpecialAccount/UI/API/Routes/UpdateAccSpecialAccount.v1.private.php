<?php

/**
 * @apiGroup           AccSpecialAccount
 * @apiName            updateAccSpecialAccount
 *
 * @api                {POST} /v1/acc_special_account/:id Endpoint title here..
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
$router->post('acc_special_account/{id}', [
    'as' => 'api_accspecialaccount_update_acc_special_account',
    'uses'  => 'Controller@updateAccSpecialAccount',
    'middleware' => [
      'auth:api',
    ],
]);
