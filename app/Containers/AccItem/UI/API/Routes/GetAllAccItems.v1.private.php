<?php

/**
 * @apiGroup           AccItem
 * @apiName            getAllAccItems
 *
 * @api                {GET} /v1/acc_item Endpoint title here..
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
$router->get('acc_item', [
    'as' => 'api_accitem_get_all_acc_items',
    'uses'  => 'Controller@getAllAccItems',
    'middleware' => [
      'auth:api',
    ],
]);
