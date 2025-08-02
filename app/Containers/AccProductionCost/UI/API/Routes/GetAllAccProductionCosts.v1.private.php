<?php

/**
 * @apiGroup           AccProductionCost
 * @apiName            getAllAccProductionCosts
 *
 * @api                {GET} /v1/acc_production_cost Endpoint title here..
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
$router->get('acc_production_cost', [
    'as' => 'api_accproductioncost_get_all_acc_production_costs',
    'uses'  => 'Controller@getAllAccProductionCosts',
    'middleware' => [
      'auth:api',
    ],
]);
