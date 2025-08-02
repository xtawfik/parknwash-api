<?php

/**
 * @apiGroup           JobDescription
 * @apiName            deleteJobDescription
 *
 * @api                {DELETE} /v1/job_description/:id Endpoint title here..
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
$router->delete('job_description/{id}', [
    'as' => 'api_jobdescription_delete_job_description',
    'uses'  => 'Controller@deleteJobDescription',
    'middleware' => [
      'auth:api',
    ],
]);
