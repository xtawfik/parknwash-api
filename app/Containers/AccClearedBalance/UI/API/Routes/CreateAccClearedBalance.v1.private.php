<?php

/**
 * @apiGroup           AccClearedBalance
 * @apiName            createAccClearedBalance
 *
 * @api                {POST} /v1/acc_cleared_balance Endpoint title here..
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
$router->post('acc_cleared_balance', [
    'as' => 'api_accclearedbalance_create_acc_cleared_balance',
    'uses'  => 'Controller@createAccClearedBalance',
    'middleware' => [
      'auth:api',
    ],
]);
