<?php

/**
 * @apiGroup           AccProductionOrder
 * @apiName            deleteAccProductionOrder
 *
 * @api                {DELETE} /v1/acc_production_order/:id Endpoint title here..
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
$router->delete('acc_production_order/{id}', [
    'as' => 'api_accproductionorder_delete_acc_production_order',
    'uses'  => 'Controller@deleteAccProductionOrder',
    'middleware' => [
      'auth:api',
    ],
]);
