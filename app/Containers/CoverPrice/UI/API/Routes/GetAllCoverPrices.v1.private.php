<?php

/**
 * @apiGroup           CoverPrice
 * @apiName            getAllCoverPrices
 *
 * @api                {GET} /v1/cover_price Endpoint title here..
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
$router->get('cover_price', [
    'as' => 'api_coverprice_get_all_cover_prices',
    'uses'  => 'Controller@getAllCoverPrices',
    'middleware' => [
      'auth:api',
    ],
]);
