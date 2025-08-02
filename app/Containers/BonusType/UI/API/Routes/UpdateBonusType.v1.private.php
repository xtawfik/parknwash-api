<?php

/**
 * @apiGroup           BonusType
 * @apiName            updateBonusType
 *
 * @api                {POST} /v1/bonus_type/:id Endpoint title here..
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
$router->post('bonus_type/{id}', [
    'as' => 'api_bonustype_update_bonus_type',
    'uses'  => 'Controller@updateBonusType',
    'middleware' => [
      'auth:api',
    ],
]);
