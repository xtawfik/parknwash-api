<?php

/**
 * @apiGroup           AccControlType
 * @apiName            getAllAccControlTypes
 *
 * @api                {GET} /v1/acc_control_type Endpoint title here..
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
$router->get('acc_control_type', [
    'as' => 'api_acccontroltype_get_all_acc_control_types',
    'uses'  => 'Controller@getAllAccControlTypes',
    'middleware' => [
      'auth:api',
    ],
]);
