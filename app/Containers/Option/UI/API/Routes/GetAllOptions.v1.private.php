<?php

/**
 * @apiGroup           Option
 * @apiName            getAllOptions
 *
 * @api                {GET} /v1/option Endpoint title here..
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
$router->get('option', [
    'as' => 'api_option_get_all_options',
    'uses'  => 'Controller@getAllOptions',
    'middleware' => [
      'auth:api',
    ],
]);
