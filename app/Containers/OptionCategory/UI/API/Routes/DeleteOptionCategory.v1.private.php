<?php

/**
 * @apiGroup           OptionCategory
 * @apiName            deleteOptionCategory
 *
 * @api                {DELETE} /v1/option_category/:id Endpoint title here..
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
$router->delete('option_category/{id}', [
    'as' => 'api_optioncategory_delete_option_category',
    'uses'  => 'Controller@deleteOptionCategory',
    'middleware' => [
      'auth:api',
    ],
]);
