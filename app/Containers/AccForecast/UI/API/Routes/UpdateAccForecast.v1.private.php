<?php

/**
 * @apiGroup           AccForecast
 * @apiName            updateAccForecast
 *
 * @api                {POST} /v1/acc_forecast/:id Endpoint title here..
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
$router->post('acc_forecast/{id}', [
    'as' => 'api_accforecast_update_acc_forecast',
    'uses'  => 'Controller@updateAccForecast',
    'middleware' => [
      'auth:api',
    ],
]);
