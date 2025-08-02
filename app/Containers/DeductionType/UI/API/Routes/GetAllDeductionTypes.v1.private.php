<?php

/**
 * @apiGroup           DeductionType
 * @apiName            getAllDeductionTypes
 *
 * @api                {GET} /v1/deduction_type Endpoint title here..
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
$router->get('deduction_type', [
    'as' => 'api_deductiontype_get_all_deduction_types',
    'uses'  => 'Controller@getAllDeductionTypes',
    'middleware' => [
      'auth:api',
    ],
]);
