<?php

/**
 * @apiGroup           AccItem
 * @apiName            updateAccItem
 *
 * @api                {POST} /v1/acc_item/:id Endpoint title here..
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
$router->post('acc_item/{id}', [
    'as' => 'api_accitem_update_acc_item',
    'uses'  => 'Controller@updateAccItem',
    'middleware' => [
      'auth:api',
    ],
]);
