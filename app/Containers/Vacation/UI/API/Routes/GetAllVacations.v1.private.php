<?php

/**
 * @apiGroup           Vacation
 * @apiName            getAllVacations
 *
 * @api                {GET} /v1/vacation Endpoint title here..
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
$router->get('vacation', [
    'as' => 'api_vacation_get_all_vacations',
    'uses'  => 'Controller@getAllVacations',
    'middleware' => [
      'auth:api',
    ],
]);
