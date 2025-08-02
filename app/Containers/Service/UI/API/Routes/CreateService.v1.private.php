<?php

/**
 * @apiGroup           Service
 * @apiName            createService
 *
 * @api                {POST} /v1/service Endpoint title here..
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
$router->post('service', [
    'as' => 'api_service_create_service',
    'uses'  => 'Controller@createService',
    'middleware' => [
      'auth:api',
    ],
]);
