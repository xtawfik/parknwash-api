<?php

/**
 * @apiGroup           AccProject
 * @apiName            findAccProjectById
 *
 * @api                {GET} /v1/acc_project/:id Endpoint title here..
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
$router->get('acc_project/{id}', [
    'as' => 'api_accproject_find_acc_project_by_id',
    'uses'  => 'Controller@findAccProjectById',
    'middleware' => [
      'auth:api',
    ],
]);
