<?php

/**
 * @apiGroup           BonusType
 * @apiName            createBonusType
 *
 * @api                {POST} /v1/bonus_type Endpoint title here..
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
$router->post('bonus_type', [
    'as' => 'api_bonustype_create_bonus_type',
    'uses'  => 'Controller@createBonusType',
    'middleware' => [
      'auth:api',
    ],
]);
