<?php

/**
 * @apiGroup           AccClearedBalance
 * @apiName            updateAccClearedBalance
 *
 * @api                {POST} /v1/acc_cleared_balance/:id Endpoint title here..
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
$router->post('acc_cleared_balance/{id}', [
    'as' => 'api_accclearedbalance_update_acc_cleared_balance',
    'uses'  => 'Controller@updateAccClearedBalance',
    'middleware' => [
      'auth:api',
    ],
]);
