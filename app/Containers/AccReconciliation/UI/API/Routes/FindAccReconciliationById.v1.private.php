<?php

/**
 * @apiGroup           AccReconciliation
 * @apiName            findAccReconciliationById
 *
 * @api                {GET} /v1/acc_reconciliation/:id Endpoint title here..
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
$router->get('acc_reconciliation/{id}', [
    'as' => 'api_accreconciliation_find_acc_reconciliation_by_id',
    'uses'  => 'Controller@findAccReconciliationById',
    'middleware' => [
      'auth:api',
    ],
]);
