<?php

/**
 * @apiGroup           OptionCategory
 * @apiName            findOptionCategoryById
 *
 * @api                {GET} /v1/option_category/:id Endpoint title here..
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
$router->get('option_category/{id}', [
    'as' => 'api_optioncategory_find_option_category_by_id',
    'uses'  => 'Controller@findOptionCategoryById',
    'middleware' => [
      'auth:api',
    ],
]);
