<?php

/**
 * @apiGroup           AccPlace
 * @apiName            deleteAccPlace
 *
 * @api                {DELETE} /v1/acc_place/:id Endpoint title here..
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
$router->delete('acc_place/{id}', [
    'as' => 'api_accplace_delete_acc_place',
    'uses'  => 'Controller@deleteAccPlace',
    'middleware' => [
      'auth:api',
    ],
]);
