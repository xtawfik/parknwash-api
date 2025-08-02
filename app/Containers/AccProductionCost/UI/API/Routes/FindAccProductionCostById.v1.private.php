<?php

/**
 * @apiGroup           AccProductionCost
 * @apiName            findAccProductionCostById
 *
 * @api                {GET} /v1/acc_production_cost/:id Endpoint title here..
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
$router->get('acc_production_cost/{id}', [
    'as' => 'api_accproductioncost_find_acc_production_cost_by_id',
    'uses'  => 'Controller@findAccProductionCostById',
    'middleware' => [
      'auth:api',
    ],
]);
