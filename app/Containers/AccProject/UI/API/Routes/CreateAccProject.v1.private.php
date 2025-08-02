<?php

/**
 * @apiGroup           AccProject
 * @apiName            createAccProject
 *
 * @api                {POST} /v1/acc_project Endpoint title here..
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
$router->post('acc_project', [
    'as' => 'api_accproject_create_acc_project',
    'uses'  => 'Controller@createAccProject',
    'middleware' => [
      'auth:api',
    ],
]);
