<?php

/**
 * @apiGroup           AccForecast
 * @apiName            deleteAccForecast
 *
 * @api                {DELETE} /v1/acc_forecast/:id Endpoint title here..
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
$router->delete('acc_forecast/{id}', [
    'as' => 'api_accforecast_delete_acc_forecast',
    'uses'  => 'Controller@deleteAccForecast',
    'middleware' => [
      'auth:api',
    ],
]);
