<?php

/**
 * @apiGroup           Cover
 * @apiName            createCover
 *
 * @api                {POST} /v1/cover Endpoint title here..
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
$router->post('cover', [
    'as' => 'api_cover_create_cover',
    'uses'  => 'Controller@createCover',
    'middleware' => [
      'auth:api',
    ],
]);
