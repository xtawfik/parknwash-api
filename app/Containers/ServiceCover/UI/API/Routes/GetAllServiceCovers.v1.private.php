<?php

/**
 * @apiGroup           ServiceCover
 * @apiName            getAllServiceCovers
 *
 * @api                {GET} /v1/service_cover Endpoint title here..
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
$router->get('service_cover', [
    'as' => 'api_servicecover_get_all_service_covers',
    'uses'  => 'Controller@getAllServiceCovers',
    'middleware' => [
      'auth:api',
    ],
]);
