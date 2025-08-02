<?php

/**
 * @apiGroup           CategoryCountry
 * @apiName            createCategoryCountry
 *
 * @api                {POST} /v1/category_country Endpoint title here..
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
$router->post('category_country', [
    'as' => 'api_categorycountry_create_category_country',
    'uses'  => 'Controller@createCategoryCountry',
    'middleware' => [
      'auth:api',
    ],
]);
