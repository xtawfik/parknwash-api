<?php

/**
 * @apiGroup           JobCard
 * @apiName            findJobCardById
 *
 * @api                {GET} /v1/job_card/:id Endpoint title here..
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
$router->get('job_card/{id}', [
    'as' => 'api_jobcard_find_job_card_by_id',
    'uses'  => 'Controller@findJobCardById',
    'middleware' => [
      'auth:api',
    ],
]);
