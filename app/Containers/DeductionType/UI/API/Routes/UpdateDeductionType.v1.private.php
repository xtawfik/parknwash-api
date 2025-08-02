<?php

/**
 * @apiGroup           DeductionType
 * @apiName            updateDeductionType
 *
 * @api                {POST} /v1/deduction_type/:id Endpoint title here..
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
$router->post('deduction_type/{id}', [
    'as' => 'api_deductiontype_update_deduction_type',
    'uses'  => 'Controller@updateDeductionType',
    'middleware' => [
      'auth:api',
    ],
]);
