<?php

/**
 * @apiGroup           AccForecast
 * @apiName            findAccForecastById
 *
 * @api                {GET} /v1/acc_forecast/:id Endpoint title here..
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
$router->get('acc_forecast/{id}', [
    'as' => 'api_accforecast_find_acc_forecast_by_id',
    'uses'  => 'Controller@findAccForecastById',
    'middleware' => [
      'auth:api',
    ],
]);
