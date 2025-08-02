<?php

/**
 * @apiGroup           AccExpenseClaim
 * @apiName            findAccExpenseClaimById
 *
 * @api                {GET} /v1/acc_expense_claim/:id Endpoint title here..
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
$router->get('acc_expense_claim/{id}', [
    'as' => 'api_accexpenseclaim_find_acc_expense_claim_by_id',
    'uses'  => 'Controller@findAccExpenseClaimById',
    'middleware' => [
      'auth:api',
    ],
]);
