<?php

/**
 * @apiGroup           AccClearedBalance
 * @apiName            deleteAccClearedBalance
 *
 * @api                {DELETE} /v1/acc_cleared_balance/:id Endpoint title here..
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
$router->delete('acc_cleared_balance/{id}', [
    'as' => 'api_accclearedbalance_delete_acc_cleared_balance',
    'uses'  => 'Controller@deleteAccClearedBalance',
    'middleware' => [
      'auth:api',
    ],
]);
