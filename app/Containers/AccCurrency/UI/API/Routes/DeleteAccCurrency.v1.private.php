<?php

/**
 * @apiGroup           AccCurrency
 * @apiName            deleteAccCurrency
 *
 * @api                {DELETE} /v1/acc_currency/:id Endpoint title here..
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
$router->delete('acc_currency/{id}', [
    'as' => 'api_acccurrency_delete_acc_currency',
    'uses'  => 'Controller@deleteAccCurrency',
    'middleware' => [
      'auth:api',
    ],
]);
