<?php

/**
 * @apiGroup           AccControlType
 * @apiName            findAccControlTypeById
 *
 * @api                {GET} /v1/acc_control_type/:id Endpoint title here..
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
$router->get('acc_control_type/{id}', [
    'as' => 'api_acccontroltype_find_acc_control_type_by_id',
    'uses'  => 'Controller@findAccControlTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
