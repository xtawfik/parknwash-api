<?php

/**
 * @apiGroup           AccReconciliation
 * @apiName            createAccReconciliation
 *
 * @api                {POST} /v1/acc_reconciliation Endpoint title here..
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
$router->post('acc_reconciliation', [
    'as' => 'api_accreconciliation_create_acc_reconciliation',
    'uses'  => 'Controller@createAccReconciliation',
    'middleware' => [
      'auth:api',
    ],
]);
