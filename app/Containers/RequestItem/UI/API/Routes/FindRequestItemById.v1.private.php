<?php

/**
 * @apiGroup           RequestItem
 * @apiName            findRequestItemById
 *
 * @api                {GET} /v1/request_item/:id Endpoint title here..
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
$router->get('request_item/{id}', [
    'as' => 'api_requestitem_find_request_item_by_id',
    'uses'  => 'Controller@findRequestItemById',
    'middleware' => [
      'auth:api',
    ],
]);
