<?php

/**
 * @apiGroup           AllowanceType
 * @apiName            updateAllowanceType
 *
 * @api                {POST} /v1/allowance_type/:id Endpoint title here..
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
$router->post('allowance_type/{id}', [
    'as' => 'api_allowancetype_update_allowance_type',
    'uses'  => 'Controller@updateAllowanceType',
    'middleware' => [
      'auth:api',
    ],
]);
