<?php

/**
 * @apiGroup           Cover
 * @apiName            updateCover
 *
 * @api                {POST} /v1/cover/:id Endpoint title here..
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
$router->post('cover/{id}', [
    'as' => 'api_cover_update_cover',
    'uses'  => 'Controller@updateCover',
    'middleware' => [
      'auth:api',
    ],
]);
