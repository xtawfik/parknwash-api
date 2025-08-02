<?php

/**
 * @apiGroup           VacationType
 * @apiName            createVacationType
 *
 * @api                {POST} /v1/vacation_type Endpoint title here..
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
$router->post('vacation_type', [
    'as' => 'api_vacationtype_create_vacation_type',
    'uses'  => 'Controller@createVacationType',
    'middleware' => [
      'auth:api',
    ],
]);
