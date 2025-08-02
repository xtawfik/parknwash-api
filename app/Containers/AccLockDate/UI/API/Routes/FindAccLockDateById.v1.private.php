<?php

/**
 * @apiGroup           AccLockDate
 * @apiName            findAccLockDateById
 *
 * @api                {GET} /v1/acc_lock_date/:id Endpoint title here..
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
$router->get('acc_lock_date/{id}', [
    'as' => 'api_acclockdate_find_acc_lock_date_by_id',
    'uses'  => 'Controller@findAccLockDateById',
    'middleware' => [
      'auth:api',
    ],
]);
