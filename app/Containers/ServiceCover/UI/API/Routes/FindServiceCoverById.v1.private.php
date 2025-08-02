<?php

/**
 * @apiGroup           ServiceCover
 * @apiName            findServiceCoverById
 *
 * @api                {GET} /v1/service_cover/:id Endpoint title here..
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
$router->get('service_cover/{id}', [
    'as' => 'api_servicecover_find_service_cover_by_id',
    'uses'  => 'Controller@findServiceCoverById',
    'middleware' => [
      'auth:api',
    ],
]);
