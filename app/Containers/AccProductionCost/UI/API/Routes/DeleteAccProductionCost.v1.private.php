<?php

/**
 * @apiGroup           AccProductionCost
 * @apiName            deleteAccProductionCost
 *
 * @api                {DELETE} /v1/acc_production_cost/:id Endpoint title here..
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
$router->delete('acc_production_cost/{id}', [
    'as' => 'api_accproductioncost_delete_acc_production_cost',
    'uses'  => 'Controller@deleteAccProductionCost',
    'middleware' => [
      'auth:api',
    ],
]);
