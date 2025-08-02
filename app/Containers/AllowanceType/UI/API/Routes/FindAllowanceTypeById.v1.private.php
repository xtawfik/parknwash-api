<?php

/**
 * @apiGroup           AllowanceType
 * @apiName            findAllowanceTypeById
 *
 * @api                {GET} /v1/allowance_type/:id Endpoint title here..
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
$router->get('allowance_type/{id}', [
    'as' => 'api_allowancetype_find_allowance_type_by_id',
    'uses'  => 'Controller@findAllowanceTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
