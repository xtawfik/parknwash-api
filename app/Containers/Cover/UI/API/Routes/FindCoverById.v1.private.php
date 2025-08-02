<?php

/**
 * @apiGroup           Cover
 * @apiName            findCoverById
 *
 * @api                {GET} /v1/cover/:id Endpoint title here..
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
$router->get('cover/{id}', [
    'as' => 'api_cover_find_cover_by_id',
    'uses'  => 'Controller@findCoverById',
    'middleware' => [
      'auth:api',
    ],
]);
