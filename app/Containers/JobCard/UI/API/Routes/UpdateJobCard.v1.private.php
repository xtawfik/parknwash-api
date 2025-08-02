<?php

/**
 * @apiGroup           JobCard
 * @apiName            updateJobCard
 *
 * @api                {POST} /v1/job_card/:id Endpoint title here..
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
$router->post('job_card/{id}', [
    'as' => 'api_jobcard_update_job_card',
    'uses'  => 'Controller@updateJobCard',
    'middleware' => [
      'auth:api',
    ],
]);
