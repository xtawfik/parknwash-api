<?php

/**
 * @apiGroup           AccItem
 * @apiName            createAccItem
 *
 * @api                {POST} /v1/acc_item Endpoint title here..
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
$router->post('acc_item', [
    'as' => 'api_accitem_create_acc_item',
    'uses'  => 'Controller@createAccItem',
    'middleware' => [
      'auth:api',
    ],
]);
