<?php

/**
 * @apiGroup           Request
 * @apiName            updateRequest
 *
 * @api                {POST} /v1/request/:id Endpoint title here..
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
$router->post('request/{id}', [
    'as' => 'api_request_update_request',
    'uses'  => 'Controller@updateRequest',
    'middleware' => [
      'auth:api',
    ],
]);
