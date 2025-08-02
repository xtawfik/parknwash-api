<?php

/**
 * @apiGroup           Bill
 * @apiName            getAllBills
 *
 * @api                {GET} /v1/bill Endpoint title here..
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
$router->get('bill', [
    'as' => 'api_bill_get_all_bills',
    'uses'  => 'Controller@getAllBills',
    'middleware' => [
      'auth:api',
    ],
]);
