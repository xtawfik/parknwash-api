<?php

/**
 * @apiGroup           LoanType
 * @apiName            updateLoanType
 *
 * @api                {POST} /v1/loan_type/:id Endpoint title here..
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
$router->post('loan_type/{id}', [
    'as' => 'api_loantype_update_loan_type',
    'uses'  => 'Controller@updateLoanType',
    'middleware' => [
      'auth:api',
    ],
]);
