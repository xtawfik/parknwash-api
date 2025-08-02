<?php

/**
 * @apiGroup           AccControlType
 * @apiName            deleteAccControlType
 *
 * @api                {DELETE} /v1/acc_control_type/:id Endpoint title here..
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
$router->delete('acc_control_type/{id}', [
    'as' => 'api_acccontroltype_delete_acc_control_type',
    'uses'  => 'Controller@deleteAccControlType',
    'middleware' => [
      'auth:api',
    ],
]);
