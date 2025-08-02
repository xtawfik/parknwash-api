<?php

/**
 * @apiGroup           AccRecurringTransaction
 * @apiName            deleteAccRecurringTransaction
 *
 * @api                {DELETE} /v1/acc_recurring_transaction/:id Endpoint title here..
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
$router->delete('acc_recurring_transaction/{id}', [
    'as' => 'api_accrecurringtransaction_delete_acc_recurring_transaction',
    'uses'  => 'Controller@deleteAccRecurringTransaction',
    'middleware' => [
      'auth:api',
    ],
]);
