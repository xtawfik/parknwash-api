<?php

/**
 * @apiGroup           CategoryCountry
 * @apiName            findCategoryCountryById
 *
 * @api                {GET} /v1/category_country/:id Endpoint title here..
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
$router->get('category_country/{id}', [
    'as' => 'api_categorycountry_find_category_country_by_id',
    'uses'  => 'Controller@findCategoryCountryById',
    'middleware' => [
      'auth:api',
    ],
]);
