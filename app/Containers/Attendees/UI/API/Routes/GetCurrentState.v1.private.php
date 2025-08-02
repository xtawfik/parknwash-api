<?php

/**
 * @apiGroup           Attendees
 * @apiName            getCurrentStatus
 *
 * @api                {GET} /v1/attendees/status Endpoint title here..
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
$router->get('attendance/status', [
    'as' => 'api_attendees_get_current_status',
    'uses'  => 'Controller@getCurrentStatus',
    'middleware' => [
      'auth:api',
    ],
]);
