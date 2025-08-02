<?php

/**
 * @apiGroup           RequestItem
 * @apiName            createRequestItem
 *
 * @api                {POST} /v1/request_item Endpoint title here..
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
$router->post('request_item', [
    'as' => 'api_requestitem_create_request_item',
    'uses'  => 'Controller@createRequestItem',
    'middleware' => [
      'auth:api',
    ],
]);
