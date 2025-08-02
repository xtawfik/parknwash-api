<?php

/**
 * @apiGroup           ServiceType
 * @apiName            createServiceType
 *
 * @api                {POST} /v1/service_type Endpoint title here..
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
$router->post('service_type', [
    'as' => 'api_servicetype_create_service_type',
    'uses'  => 'Controller@createServiceType',
    'middleware' => [
      'auth:api',
    ],
]);
