<?php

/**
 * @apiGroup           AccItemStore
 * @apiName            createAccItemStore
 *
 * @api                {POST} /v1/acc_item_store Endpoint title here..
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
$router->post('acc_item_store', [
    'as' => 'api_accitemstore_create_acc_item_store',
    'uses'  => 'Controller@createAccItemStore',
    'middleware' => [
      'auth:api',
    ],
]);
