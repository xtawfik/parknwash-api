<?php

/**
 * @apiGroup           AccProductionCost
 * @apiName            updateAccProductionCost
 *
 * @api                {POST} /v1/acc_production_cost/:id Endpoint title here..
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
$router->post('acc_production_cost/{id}', [
    'as' => 'api_accproductioncost_update_acc_production_cost',
    'uses'  => 'Controller@updateAccProductionCost',
    'middleware' => [
      'auth:api',
    ],
]);
