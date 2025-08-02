<?php

/**
 * @apiGroup           Request
 * @apiName            createRequest
 *
 * @api                {POST} /v1/request Endpoint title here..
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
$router->post('request', [
    'as' => 'api_request_create_request',
    'uses'  => 'Controller@createRequest',
    'middleware' => [
      'auth:api',
    ],
]);
