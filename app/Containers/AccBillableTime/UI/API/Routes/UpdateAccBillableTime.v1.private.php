<?php

/**
 * @apiGroup           AccBillableTime
 * @apiName            updateAccBillableTime
 *
 * @api                {POST} /v1/acc_billable_time/:id Endpoint title here..
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
$router->post('acc_billable_time/{id}', [
    'as' => 'api_accbillabletime_update_acc_billable_time',
    'uses'  => 'Controller@updateAccBillableTime',
    'middleware' => [
      'auth:api',
    ],
]);
