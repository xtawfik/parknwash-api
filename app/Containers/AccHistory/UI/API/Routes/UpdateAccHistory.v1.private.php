<?php

/**
 * @apiGroup           AccHistory
 * @apiName            updateAccHistory
 *
 * @api                {POST} /v1/acc_history/:id Endpoint title here..
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
$router->post('acc_history/{id}', [
    'as' => 'api_acchistory_update_acc_history',
    'uses'  => 'Controller@updateAccHistory',
    'middleware' => [
      'auth:api',
    ],
]);
