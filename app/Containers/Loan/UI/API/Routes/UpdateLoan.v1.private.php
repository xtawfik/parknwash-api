<?php

/**
 * @apiGroup           Loan
 * @apiName            updateLoan
 *
 * @api                {POST} /v1/loan/:id Endpoint title here..
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
$router->post('loan/{id}', [
    'as' => 'api_loan_update_loan',
    'uses'  => 'Controller@updateLoan',
    'middleware' => [
      'auth:api',
    ],
]);
