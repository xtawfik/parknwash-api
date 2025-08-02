<?php

/**
 * @apiGroup           CategoryCountry
 * @apiName            getAllCategoryCountries
 *
 * @api                {GET} /v1/category_country Endpoint title here..
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
$router->get('category_country', [
    'as' => 'api_categorycountry_get_all_category_countries',
    'uses'  => 'Controller@getAllCategoryCountries',
    'middleware' => [
      'auth:api',
    ],
]);
