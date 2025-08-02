<?php

/**
 * @apiGroup           Loan
 * @apiName            getAllLoans
 *
 * @api                {GET} /v1/loan Endpoint title here..
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
$router->get('loan', [
    'as' => 'api_loan_get_all_loans',
    'uses'  => 'Controller@getAllLoans',
    'middleware' => [
      'auth:api',
    ],
]);
