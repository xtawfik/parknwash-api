<?php

/**
 * @apiGroup           Attendees
 * @apiName            updateAttendees
 *
 * @api                {POST} /v1/attendees/:id Endpoint title here..
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
$router->post('attendees/{id}', [
    'as' => 'api_attendees_update_attendees',
    'uses'  => 'Controller@updateAttendees',
    'middleware' => [
      'auth:api',
    ],
]);
