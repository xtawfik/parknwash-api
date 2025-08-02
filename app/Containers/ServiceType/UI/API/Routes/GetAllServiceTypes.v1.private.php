<?php

/**
 * @apiGroup           ServiceType
 * @apiName            getAllServiceTypes
 *
 * @api                {GET} /v1/service_type Endpoint title here..
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
$router->get('service_type', [
    'as' => 'api_servicetype_get_all_service_types',
    'uses'  => 'Controller@getAllServiceTypes',
    'middleware' => [
      'auth:api',
    ],
]);
