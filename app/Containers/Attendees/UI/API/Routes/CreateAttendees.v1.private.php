<?php

/**
 * @apiGroup           Attendees
 * @apiName            createAttendees
 *
 * @api                {POST} /v1/attendees Endpoint title here..
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
$router->post('attendees', [
    'as' => 'api_attendees_create_attendees',
    'uses'  => 'Controller@createAttendees',
    'middleware' => [
      'auth:api',
    ],
]);
