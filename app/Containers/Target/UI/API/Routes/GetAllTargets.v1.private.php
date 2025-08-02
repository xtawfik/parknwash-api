<?php

/**
 * @apiGroup           Target
 * @apiName            getAllTargets
 *
 * @api                {GET} /v1/target Endpoint title here..
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
$router->get('target', [
    'as' => 'api_target_get_all_targets',
    'uses'  => 'Controller@getAllTargets',
    'middleware' => [
      'auth:api',
    ],
]);
