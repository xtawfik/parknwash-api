<?php

/**
 * @apiGroup           AccExpenseClaim
 * @apiName            updateAccExpenseClaim
 *
 * @api                {POST} /v1/acc_expense_claim/:id Endpoint title here..
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
$router->post('acc_expense_claim/{id}', [
    'as' => 'api_accexpenseclaim_update_acc_expense_claim',
    'uses'  => 'Controller@updateAccExpenseClaim',
    'middleware' => [
      'auth:api',
    ],
]);
