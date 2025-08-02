<?php

/**
 * @apiGroup           AccHistory
 * @apiName            getAllAccHistories
 *
 * @api                {GET} /v1/acc_history Endpoint title here..
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
$router->get('acc_history', [
    'as' => 'api_acchistory_get_all_acc_histories',
    'uses'  => 'Controller@getAllAccHistories',
    'middleware' => [
      'auth:api',
    ],
]);
