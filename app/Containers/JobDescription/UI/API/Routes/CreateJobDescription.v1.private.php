<?php

/**
 * @apiGroup           JobDescription
 * @apiName            createJobDescription
 *
 * @api                {POST} /v1/job_description Endpoint title here..
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
$router->post('job_description', [
    'as' => 'api_jobdescription_create_job_description',
    'uses'  => 'Controller@createJobDescription',
    'middleware' => [
      'auth:api',
    ],
]);
