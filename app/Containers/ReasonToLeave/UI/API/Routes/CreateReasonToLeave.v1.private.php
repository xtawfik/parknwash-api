<?php

/**
 * @apiGroup           ReasonToLeave
 * @apiName            createReasonToLeave
 *
 * @api                {POST} /v1/reason_to_leave Endpoint title here..
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
$router->post('reason_to_leave', [
    'as' => 'api_reasontoleave_create_reason_to_leave',
    'uses'  => 'Controller@createReasonToLeave',
    'middleware' => [
      'auth:api',
    ],
]);
