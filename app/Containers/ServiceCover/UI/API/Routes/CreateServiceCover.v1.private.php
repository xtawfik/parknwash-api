<?php

/**
 * @apiGroup           ServiceCover
 * @apiName            createServiceCover
 *
 * @api                {POST} /v1/service_cover Endpoint title here..
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
$router->post('service_cover', [
    'as' => 'api_servicecover_create_service_cover',
    'uses'  => 'Controller@createServiceCover',
    'middleware' => [
      'auth:api',
    ],
]);
