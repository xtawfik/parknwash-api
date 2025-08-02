<?php

/**
 * @apiGroup           DeductionType
 * @apiName            createDeductionType
 *
 * @api                {POST} /v1/deduction_type Endpoint title here..
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
$router->post('deduction_type', [
    'as' => 'api_deductiontype_create_deduction_type',
    'uses'  => 'Controller@createDeductionType',
    'middleware' => [
      'auth:api',
    ],
]);
