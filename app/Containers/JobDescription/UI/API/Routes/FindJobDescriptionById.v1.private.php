<?php

/**
 * @apiGroup           JobDescription
 * @apiName            findJobDescriptionById
 *
 * @api                {GET} /v1/job_description/:id Endpoint title here..
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
$router->get('job_description/{id}', [
    'as' => 'api_jobdescription_find_job_description_by_id',
    'uses'  => 'Controller@findJobDescriptionById',
    'middleware' => [
      'auth:api',
    ],
]);
