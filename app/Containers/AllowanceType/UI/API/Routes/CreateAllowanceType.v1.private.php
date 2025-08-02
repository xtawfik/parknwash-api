<?php

/**
 * @apiGroup           AllowanceType
 * @apiName            createAllowanceType
 *
 * @api                {POST} /v1/allowance_type Endpoint title here..
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
$router->post('allowance_type', [
    'as' => 'api_allowancetype_create_allowance_type',
    'uses'  => 'Controller@createAllowanceType',
    'middleware' => [
      'auth:api',
    ],
]);
