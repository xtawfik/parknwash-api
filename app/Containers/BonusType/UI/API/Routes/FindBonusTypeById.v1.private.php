<?php

/**
 * @apiGroup           BonusType
 * @apiName            findBonusTypeById
 *
 * @api                {GET} /v1/bonus_type/:id Endpoint title here..
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
$router->get('bonus_type/{id}', [
    'as' => 'api_bonustype_find_bonus_type_by_id',
    'uses'  => 'Controller@findBonusTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
