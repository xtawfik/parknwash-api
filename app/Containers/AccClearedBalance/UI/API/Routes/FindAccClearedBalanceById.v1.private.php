<?php

/**
 * @apiGroup           AccClearedBalance
 * @apiName            findAccClearedBalanceById
 *
 * @api                {GET} /v1/acc_cleared_balance/:id Endpoint title here..
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
$router->get('acc_cleared_balance/{id}', [
    'as' => 'api_accclearedbalance_find_acc_cleared_balance_by_id',
    'uses'  => 'Controller@findAccClearedBalanceById',
    'middleware' => [
      'auth:api',
    ],
]);
