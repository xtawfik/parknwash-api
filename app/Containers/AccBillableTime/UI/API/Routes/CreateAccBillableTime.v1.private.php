<?php

/**
 * @apiGroup           AccBillableTime
 * @apiName            createAccBillableTime
 *
 * @api                {POST} /v1/acc_billable_time Endpoint title here..
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
$router->post('acc_billable_time', [
    'as' => 'api_accbillabletime_create_acc_billable_time',
    'uses'  => 'Controller@createAccBillableTime',
    'middleware' => [
      'auth:api',
    ],
]);
