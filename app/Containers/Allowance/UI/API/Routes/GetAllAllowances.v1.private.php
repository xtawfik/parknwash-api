<?php

/**
 * @apiGroup           Allowance
 * @apiName            getAllAllowances
 *
 * @api                {GET} /v1/allowance Endpoint title here..
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
$router->get('allowance', [
    'as' => 'api_allowance_get_all_allowances',
    'uses'  => 'Controller@getAllAllowances',
    'middleware' => [
      'auth:api',
    ],
]);
