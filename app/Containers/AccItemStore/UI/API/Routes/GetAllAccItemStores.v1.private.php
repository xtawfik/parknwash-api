<?php

/**
 * @apiGroup           AccItemStore
 * @apiName            getAllAccItemStores
 *
 * @api                {GET} /v1/acc_item_store Endpoint title here..
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
$router->get('acc_item_store', [
    'as' => 'api_accitemstore_get_all_acc_item_stores',
    'uses'  => 'Controller@getAllAccItemStores',
    'middleware' => [
      'auth:api',
    ],
]);
