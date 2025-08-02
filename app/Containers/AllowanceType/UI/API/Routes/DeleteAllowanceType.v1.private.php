<?php

/**
 * @apiGroup           AllowanceType
 * @apiName            deleteAllowanceType
 *
 * @api                {DELETE} /v1/allowance_type/:id Endpoint title here..
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
$router->delete('allowance_type/{id}', [
    'as' => 'api_allowancetype_delete_allowance_type',
    'uses'  => 'Controller@deleteAllowanceType',
    'middleware' => [
      'auth:api',
    ],
]);
