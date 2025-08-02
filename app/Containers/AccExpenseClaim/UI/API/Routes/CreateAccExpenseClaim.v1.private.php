<?php

/**
 * @apiGroup           AccExpenseClaim
 * @apiName            createAccExpenseClaim
 *
 * @api                {POST} /v1/acc_expense_claim Endpoint title here..
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
$router->post('acc_expense_claim', [
    'as' => 'api_accexpenseclaim_create_acc_expense_claim',
    'uses'  => 'Controller@createAccExpenseClaim',
    'middleware' => [
      'auth:api',
    ],
]);
