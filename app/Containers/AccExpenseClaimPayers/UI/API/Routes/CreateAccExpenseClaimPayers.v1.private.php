<?php

/**
 * @apiGroup           AccExpenseClaimPayers
 * @apiName            createAccExpenseClaimPayers
 *
 * @api                {POST} /v1/acc_expense_claim_payers Endpoint title here..
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
$router->post('acc_expense_claim_payers', [
    'as' => 'api_accexpenseclaimpayers_create_acc_expense_claim_payers',
    'uses'  => 'Controller@createAccExpenseClaimPayers',
    'middleware' => [
      'auth:api',
    ],
]);
