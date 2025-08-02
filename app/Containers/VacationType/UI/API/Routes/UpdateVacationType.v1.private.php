<?php

/**
 * @apiGroup           VacationType
 * @apiName            updateVacationType
 *
 * @api                {POST} /v1/vacation_type/:id Endpoint title here..
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
$router->post('vacation_type/{id}', [
    'as' => 'api_vacationtype_update_vacation_type',
    'uses'  => 'Controller@updateVacationType',
    'middleware' => [
      'auth:api',
    ],
]);
