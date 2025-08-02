<?php

/**
 * @apiGroup           AccRecurringTransaction
 * @apiName            updateAccRecurringTransaction
 *
 * @api                {POST} /v1/acc_recurring_transaction/:id Endpoint title here..
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
$router->post('acc_recurring_transaction/{id}', [
    'as' => 'api_accrecurringtransaction_update_acc_recurring_transaction',
    'uses'  => 'Controller@updateAccRecurringTransaction',
    'middleware' => [
      'auth:api',
    ],
]);
