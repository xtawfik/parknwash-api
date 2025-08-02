<?php

/**
 * @apiGroup           Bonus
 * @apiName            findBonusById
 *
 * @api                {GET} /v1/bonus/:id Endpoint title here..
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
$router->get('bonus/{id}', [
    'as' => 'api_bonus_find_bonus_by_id',
    'uses'  => 'Controller@findBonusById',
    'middleware' => [
      'auth:api',
    ],
]);
