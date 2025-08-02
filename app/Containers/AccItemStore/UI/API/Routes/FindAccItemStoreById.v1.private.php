<?php

/**
 * @apiGroup           AccItemStore
 * @apiName            findAccItemStoreById
 *
 * @api                {GET} /v1/acc_item_store/:id Endpoint title here..
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
$router->get('acc_item_store/{id}', [
    'as' => 'api_accitemstore_find_acc_item_store_by_id',
    'uses'  => 'Controller@findAccItemStoreById',
    'middleware' => [
      'auth:api',
    ],
]);
