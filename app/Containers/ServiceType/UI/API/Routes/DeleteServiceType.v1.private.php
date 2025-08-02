<?php

/**
 * @apiGroup           ServiceType
 * @apiName            deleteServiceType
 *
 * @api                {DELETE} /v1/service_type/:id Endpoint title here..
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
$router->delete('service_type/{id}', [
    'as' => 'api_servicetype_delete_service_type',
    'uses'  => 'Controller@deleteServiceType',
    'middleware' => [
      'auth:api',
    ],
]);
