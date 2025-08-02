<?php

/**
 * @apiGroup           Option
 * @apiName            deleteOption
 *
 * @api                {DELETE} /v1/option/:id Endpoint title here..
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
$router->delete('option/{id}', [
    'as' => 'api_option_delete_option',
    'uses'  => 'Controller@deleteOption',
    'middleware' => [
      'auth:api',
    ],
]);
