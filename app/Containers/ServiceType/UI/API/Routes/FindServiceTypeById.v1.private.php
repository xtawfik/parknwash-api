<?php

/**
 * @apiGroup           ServiceType
 * @apiName            findServiceTypeById
 *
 * @api                {GET} /v1/service_type/:id Endpoint title here..
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
$router->get('service_type/{id}', [
    'as' => 'api_servicetype_find_service_type_by_id',
    'uses'  => 'Controller@findServiceTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
