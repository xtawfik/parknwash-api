<?php

/**
 * @apiGroup           Option
 * @apiName            createOption
 *
 * @api                {POST} /v1/option Endpoint title here..
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
$router->post('option', [
    'as' => 'api_option_create_option',
    'uses'  => 'Controller@createOption',
    'middleware' => [
      'auth:api',
    ],
]);
