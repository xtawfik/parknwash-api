<?php

/**
 * @apiGroup           AccLockDate
 * @apiName            deleteAccLockDate
 *
 * @api                {DELETE} /v1/acc_lock_date/:id Endpoint title here..
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
$router->delete('acc_lock_date/{id}', [
    'as' => 'api_acclockdate_delete_acc_lock_date',
    'uses'  => 'Controller@deleteAccLockDate',
    'middleware' => [
      'auth:api',
    ],
]);
