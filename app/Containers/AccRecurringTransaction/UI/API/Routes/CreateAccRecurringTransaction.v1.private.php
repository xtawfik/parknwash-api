<?php

/**
 * @apiGroup           AccRecurringTransaction
 * @apiName            createAccRecurringTransaction
 *
 * @api                {POST} /v1/acc_recurring_transaction Endpoint title here..
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
$router->post('acc_recurring_transaction', [
    'as' => 'api_accrecurringtransaction_create_acc_recurring_transaction',
    'uses'  => 'Controller@createAccRecurringTransaction',
    'middleware' => [
      'auth:api',
    ],
]);
