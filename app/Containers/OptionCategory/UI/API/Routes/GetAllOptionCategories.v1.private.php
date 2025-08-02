<?php

/**
 * @apiGroup           OptionCategory
 * @apiName            getAllOptionCategories
 *
 * @api                {GET} /v1/option_category Endpoint title here..
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
$router->get('option_category', [
    'as' => 'api_optioncategory_get_all_option_categories',
    'uses'  => 'Controller@getAllOptionCategories',
    'middleware' => [
      'auth:api',
    ],
]);
