<?php

/**
 * @apiGroup           AccItem
 * @apiName            findAccItemById
 *
 * @api                {GET} /v1/acc_item/:id Endpoint title here..
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
$router->get('acc_item/{id}', [
    'as' => 'api_accitem_find_acc_item_by_id',
    'uses'  => 'Controller@findAccItemById',
    'middleware' => [
      'auth:api',
    ],
]);
