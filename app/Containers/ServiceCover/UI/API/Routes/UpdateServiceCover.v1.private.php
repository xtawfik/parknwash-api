<?php

/**
 * @apiGroup           ServiceCover
 * @apiName            updateServiceCover
 *
 * @api                {POST} /v1/service_cover/:id Endpoint title here..
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
$router->post('service_cover/{id}', [
    'as' => 'api_servicecover_update_service_cover',
    'uses'  => 'Controller@updateServiceCover',
    'middleware' => [
      'auth:api',
    ],
]);
