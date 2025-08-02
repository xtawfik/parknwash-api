<?php

/**
 * @apiGroup           Option
 * @apiName            updateOption
 *
 * @api                {POST} /v1/option/:id Endpoint title here..
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
$router->post('option/{id}', [
    'as' => 'api_option_update_option',
    'uses'  => 'Controller@updateOption',
    'middleware' => [
      'auth:api',
    ],
]);
