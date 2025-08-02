<?php

/**
 * @apiGroup           AccPlace
 * @apiName            updateAccPlace
 *
 * @api                {POST} /v1/acc_place/:id Endpoint title here..
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
$router->post('acc_place/{id}', [
    'as' => 'api_accplace_update_acc_place',
    'uses'  => 'Controller@updateAccPlace',
    'middleware' => [
      'auth:api',
    ],
]);
