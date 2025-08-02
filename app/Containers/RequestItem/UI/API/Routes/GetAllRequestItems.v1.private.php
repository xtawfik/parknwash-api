<?php

/**
 * @apiGroup           RequestItem
 * @apiName            getAllRequestItems
 *
 * @api                {GET} /v1/request_item Endpoint title here..
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
$router->get('request_item', [
    'as' => 'api_requestitem_get_all_request_items',
    'uses'  => 'Controller@getAllRequestItems',
    'middleware' => [
      'auth:api',
    ],
]);
