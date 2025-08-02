<?php

/**
 * @apiGroup           Request
 * @apiName            deleteRequest
 *
 * @api                {DELETE} /v1/request/:id Endpoint title here..
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
$router->delete('request/{id}', [
    'as' => 'api_request_delete_request',
    'uses'  => 'Controller@deleteRequest',
    'middleware' => [
      'auth:api',
    ],
]);
