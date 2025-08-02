<?php

/**
 * @apiGroup           JobCard
 * @apiName            createJobCard
 *
 * @api                {POST} /v1/job_card Endpoint title here..
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
$router->post('job_card', [
    'as' => 'api_jobcard_create_job_card',
    'uses'  => 'Controller@createJobCard',
    'middleware' => [
      'auth:api',
    ],
]);
