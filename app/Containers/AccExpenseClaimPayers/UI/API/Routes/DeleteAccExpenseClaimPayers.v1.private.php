<?php

/**
 * @apiGroup           AccExpenseClaimPayers
 * @apiName            deleteAccExpenseClaimPayers
 *
 * @api                {DELETE} /v1/acc_expense_claim_payers/:id Endpoint title here..
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
$router->delete('acc_expense_claim_payers/{id}', [
    'as' => 'api_accexpenseclaimpayers_delete_acc_expense_claim_payers',
    'uses'  => 'Controller@deleteAccExpenseClaimPayers',
    'middleware' => [
      'auth:api',
    ],
]);
