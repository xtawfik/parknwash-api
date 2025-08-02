<?php

/**
 * @apiGroup           JobCard
 * @apiName            deleteJobCard
 *
 * @api                {DELETE} /v1/job_card/:id Endpoint title here..
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
$router->delete('job_card/{id}', [
    'as' => 'api_jobcard_delete_job_card',
    'uses'  => 'Controller@deleteJobCard',
    'middleware' => [
      'auth:api',
    ],
]);
