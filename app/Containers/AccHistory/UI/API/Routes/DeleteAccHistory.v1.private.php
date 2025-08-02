<?php

/**
 * @apiGroup           AccHistory
 * @apiName            deleteAccHistory
 *
 * @api                {DELETE} /v1/acc_history/:id Endpoint title here..
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
$router->delete('acc_history/{id}', [
    'as' => 'api_acchistory_delete_acc_history',
    'uses'  => 'Controller@deleteAccHistory',
    'middleware' => [
      'auth:api',
    ],
]);
