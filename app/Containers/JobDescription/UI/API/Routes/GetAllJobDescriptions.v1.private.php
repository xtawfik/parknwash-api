<?php

/**
 * @apiGroup           JobDescription
 * @apiName            getAllJobDescriptions
 *
 * @api                {GET} /v1/job_description Endpoint title here..
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
$router->get('job_description', [
    'as' => 'api_jobdescription_get_all_job_descriptions',
    'uses'  => 'Controller@getAllJobDescriptions',
    'middleware' => [
      'auth:api',
    ],
]);
