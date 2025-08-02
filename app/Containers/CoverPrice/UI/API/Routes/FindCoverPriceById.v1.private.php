<?php

/**
 * @apiGroup           CoverPrice
 * @apiName            findCoverPriceById
 *
 * @api                {GET} /v1/cover_price/:id Endpoint title here..
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
$router->get('cover_price/{id}', [
    'as' => 'api_coverprice_find_cover_price_by_id',
    'uses'  => 'Controller@findCoverPriceById',
    'middleware' => [
      'auth:api',
    ],
]);
