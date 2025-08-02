<?php

/**
 * @apiGroup           AccProject
 * @apiName            deleteAccProject
 *
 * @api                {DELETE} /v1/acc_project/:id Endpoint title here..
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
$router->delete('acc_project/{id}', [
    'as' => 'api_accproject_delete_acc_project',
    'uses'  => 'Controller@deleteAccProject',
    'middleware' => [
      'auth:api',
    ],
]);
