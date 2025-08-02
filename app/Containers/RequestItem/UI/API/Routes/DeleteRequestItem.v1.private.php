<?php

/**
 * @apiGroup           RequestItem
 * @apiName            deleteRequestItem
 *
 * @api                {DELETE} /v1/request_item/:id Endpoint title here..
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
$router->delete('request_item/{id}', [
    'as' => 'api_requestitem_delete_request_item',
    'uses'  => 'Controller@deleteRequestItem',
    'middleware' => [
      'auth:api',
    ],
]);
