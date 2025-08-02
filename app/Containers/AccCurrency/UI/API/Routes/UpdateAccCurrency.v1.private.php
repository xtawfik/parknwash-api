<?php

/**
 * @apiGroup           AccCurrency
 * @apiName            updateAccCurrency
 *
 * @api                {POST} /v1/acc_currency/:id Endpoint title here..
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
$router->post('acc_currency/{id}', [
    'as' => 'api_acccurrency_update_acc_currency',
    'uses'  => 'Controller@updateAccCurrency',
    'middleware' => [
      'auth:api',
    ],
]);
