<?php

/**
 * @apiGroup           ReasonToLeave
 * @apiName            deleteReasonToLeave
 *
 * @api                {DELETE} /v1/reason_to_leave/:id Endpoint title here..
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
$router->delete('reason_to_leave/{id}', [
    'as' => 'api_reasontoleave_delete_reason_to_leave',
    'uses'  => 'Controller@deleteReasonToLeave',
    'middleware' => [
      'auth:api',
    ],
]);
