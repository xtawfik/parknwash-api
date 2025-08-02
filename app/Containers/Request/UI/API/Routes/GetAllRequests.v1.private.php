<?php

/**
 * @apiGroup           Request
 * @apiName            getAllRequests
 *
 * @api                {GET} /v1/request Endpoint title here..
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
$router->get('request', [
    'as' => 'api_request_get_all_requests',
    'uses'  => 'Controller@getAllRequests',
    'middleware' => [
      'auth:api',
    ],
]);
