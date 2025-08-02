<?php

/**
 * @apiGroup           OptionCategory
 * @apiName            createOptionCategory
 *
 * @api                {POST} /v1/option_category Endpoint title here..
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
$router->post('option_category', [
    'as' => 'api_optioncategory_create_option_category',
    'uses'  => 'Controller@createOptionCategory',
    'middleware' => [
      'auth:api',
    ],
]);
