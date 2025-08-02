<?php

/**
 * @apiGroup           AccItemStore
 * @apiName            deleteAccItemStore
 *
 * @api                {DELETE} /v1/acc_item_store/:id Endpoint title here..
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
$router->delete('acc_item_store/{id}', [
    'as' => 'api_accitemstore_delete_acc_item_store',
    'uses'  => 'Controller@deleteAccItemStore',
    'middleware' => [
      'auth:api',
    ],
]);
