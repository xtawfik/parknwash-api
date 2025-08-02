<?php

/**
 * @apiGroup           Cover
 * @apiName            getAllCovers
 *
 * @api                {GET} /v1/cover Endpoint title here..
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
$router->get('cover', [
    'as' => 'api_cover_get_all_covers',
    'uses'  => 'Controller@getAllCovers',
    'middleware' => [
      'auth:api',
    ],
]);
