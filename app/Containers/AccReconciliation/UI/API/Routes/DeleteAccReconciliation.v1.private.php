<?php

/**
 * @apiGroup           AccReconciliation
 * @apiName            deleteAccReconciliation
 *
 * @api                {DELETE} /v1/acc_reconciliation/:id Endpoint title here..
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
$router->delete('acc_reconciliation/{id}', [
    'as' => 'api_accreconciliation_delete_acc_reconciliation',
    'uses'  => 'Controller@deleteAccReconciliation',
    'middleware' => [
      'auth:api',
    ],
]);
