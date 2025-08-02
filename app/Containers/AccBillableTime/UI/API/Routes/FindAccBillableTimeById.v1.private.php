<?php

/**
 * @apiGroup           AccBillableTime
 * @apiName            findAccBillableTimeById
 *
 * @api                {GET} /v1/acc_billable_time/:id Endpoint title here..
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
$router->get('acc_billable_time/{id}', [
    'as' => 'api_accbillabletime_find_acc_billable_time_by_id',
    'uses'  => 'Controller@findAccBillableTimeById',
    'middleware' => [
      'auth:api',
    ],
]);
