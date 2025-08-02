<?php

/**
 * @apiGroup           VacationType
 * @apiName            getAllVacationTypes
 *
 * @api                {GET} /v1/vacation_type Endpoint title here..
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
$router->get('vacation_type', [
    'as' => 'api_vacationtype_get_all_vacation_types',
    'uses'  => 'Controller@getAllVacationTypes',
    'middleware' => [
      'auth:api',
    ],
]);
