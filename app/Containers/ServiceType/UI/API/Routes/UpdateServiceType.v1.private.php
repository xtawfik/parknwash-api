<?php

/**
 * @apiGroup           ServiceType
 * @apiName            updateServiceType
 *
 * @api                {POST} /v1/service_type/:id Endpoint title here..
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
$router->post('service_type/{id}', [
    'as' => 'api_servicetype_update_service_type',
    'uses'  => 'Controller@updateServiceType',
    'middleware' => [
      'auth:api',
    ],
]);
