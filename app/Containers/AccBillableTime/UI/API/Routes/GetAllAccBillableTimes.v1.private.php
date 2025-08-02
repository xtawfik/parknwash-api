<?php

/**
 * @apiGroup           AccBillableTime
 * @apiName            getAllAccBillableTimes
 *
 * @api                {GET} /v1/acc_billable_time Endpoint title here..
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
$router->get('acc_billable_time', [
    'as' => 'api_accbillabletime_get_all_acc_billable_times',
    'uses'  => 'Controller@getAllAccBillableTimes',
    'middleware' => [
      'auth:api',
    ],
]);
