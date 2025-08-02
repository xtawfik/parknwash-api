<?php

/**
 * @apiGroup           Loan
 * @apiName            findLoanById
 *
 * @api                {GET} /v1/loan/:id Endpoint title here..
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
$router->get('loan/{id}', [
    'as' => 'api_loan_find_loan_by_id',
    'uses'  => 'Controller@findLoanById',
    'middleware' => [
      'auth:api',
    ],
]);
