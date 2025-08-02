<?php

/**
 * @apiGroup           AccProductionOrder
 * @apiName            updateAccProductionOrder
 *
 * @api                {POST} /v1/acc_production_order/:id Endpoint title here..
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
$router->post('acc_production_order/{id}', [
    'as' => 'api_accproductionorder_update_acc_production_order',
    'uses'  => 'Controller@updateAccProductionOrder',
    'middleware' => [
      'auth:api',
    ],
]);
