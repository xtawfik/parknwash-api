<?php

/**
 * @apiGroup           AccHistory
 * @apiName            createAccHistory
 *
 * @api                {POST} /v1/acc_history Endpoint title here..
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
$router->post('acc_history', [
    'as' => 'api_acchistory_create_acc_history',
    'uses'  => 'Controller@createAccHistory',
    'middleware' => [
      'auth:api',
    ],
]);
