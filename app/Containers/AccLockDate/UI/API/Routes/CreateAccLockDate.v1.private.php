<?php

/**
 * @apiGroup           AccLockDate
 * @apiName            createAccLockDate
 *
 * @api                {POST} /v1/acc_lock_date Endpoint title here..
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
$router->post('acc_lock_date', [
    'as' => 'api_acclockdate_create_acc_lock_date',
    'uses'  => 'Controller@createAccLockDate',
    'middleware' => [
      'auth:api',
    ],
]);
