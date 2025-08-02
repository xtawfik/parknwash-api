<?php

/**
 * @apiGroup           Attendees
 * @apiName            deleteAttendees
 *
 * @api                {DELETE} /v1/attendees/:id Endpoint title here..
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
$router->delete('attendees/{id}', [
    'as' => 'api_attendees_delete_attendees',
    'uses'  => 'Controller@deleteAttendees',
    'middleware' => [
      'auth:api',
    ],
]);
