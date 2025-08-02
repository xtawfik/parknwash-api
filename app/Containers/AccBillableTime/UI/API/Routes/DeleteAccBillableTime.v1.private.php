<?php

/**
 * @apiGroup           AccBillableTime
 * @apiName            deleteAccBillableTime
 *
 * @api                {DELETE} /v1/acc_billable_time/:id Endpoint title here..
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
$router->delete('acc_billable_time/{id}', [
    'as' => 'api_accbillabletime_delete_acc_billable_time',
    'uses'  => 'Controller@deleteAccBillableTime',
    'middleware' => [
      'auth:api',
    ],
]);
