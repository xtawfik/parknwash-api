<?php

/**
 * @apiGroup           Service
 * @apiName            deleteService
 *
 * @api                {DELETE} /v1/service/:id Endpoint title here..
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
$router->delete('service/{id}', [
    'as' => 'api_service_delete_service',
    'uses'  => 'Controller@deleteService',
    'middleware' => [
      'auth:api',
    ],
]);
