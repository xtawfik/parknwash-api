<?php

/**
 * @apiGroup           CoverPrice
 * @apiName            createCoverPrice
 *
 * @api                {POST} /v1/cover_price Endpoint title here..
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
$router->post('cover_price', [
    'as' => 'api_coverprice_create_cover_price',
    'uses'  => 'Controller@createCoverPrice',
    'middleware' => [
      'auth:api',
    ],
]);
