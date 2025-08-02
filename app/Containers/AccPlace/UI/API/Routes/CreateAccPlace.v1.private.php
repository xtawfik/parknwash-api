<?php

/**
 * @apiGroup           AccPlace
 * @apiName            createAccPlace
 *
 * @api                {POST} /v1/acc_place Endpoint title here..
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
$router->post('acc_place', [
    'as' => 'api_accplace_create_acc_place',
    'uses'  => 'Controller@createAccPlace',
    'middleware' => [
      'auth:api',
    ],
]);
