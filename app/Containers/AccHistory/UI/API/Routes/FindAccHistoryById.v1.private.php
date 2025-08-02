<?php

/**
 * @apiGroup           AccHistory
 * @apiName            findAccHistoryById
 *
 * @api                {GET} /v1/acc_history/:id Endpoint title here..
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
$router->get('acc_history/{id}', [
    'as' => 'api_acchistory_find_acc_history_by_id',
    'uses'  => 'Controller@findAccHistoryById',
    'middleware' => [
      'auth:api',
    ],
]);
