<?php

/**
 * @apiGroup           AllowanceType
 * @apiName            getAllAllowanceTypes
 *
 * @api                {GET} /v1/allowance_type Endpoint title here..
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
$router->get('allowance_type', [
    'as' => 'api_allowancetype_get_all_allowance_types',
    'uses'  => 'Controller@getAllAllowanceTypes',
    'middleware' => [
      'auth:api',
    ],
]);
