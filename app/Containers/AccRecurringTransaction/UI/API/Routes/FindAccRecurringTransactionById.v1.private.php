<?php

/**
 * @apiGroup           AccRecurringTransaction
 * @apiName            findAccRecurringTransactionById
 *
 * @api                {GET} /v1/acc_recurring_transaction/:id Endpoint title here..
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
$router->get('acc_recurring_transaction/{id}', [
    'as' => 'api_accrecurringtransaction_find_acc_recurring_transaction_by_id',
    'uses'  => 'Controller@findAccRecurringTransactionById',
    'middleware' => [
      'auth:api',
    ],
]);
