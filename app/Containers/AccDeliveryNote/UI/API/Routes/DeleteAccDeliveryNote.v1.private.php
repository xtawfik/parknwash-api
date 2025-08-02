<?php

/**
 * @apiGroup           AccDeliveryNote
 * @apiName            deleteAccDeliveryNote
 *
 * @api                {DELETE} /v1/acc_delivery_note/:id Endpoint title here..
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
$router->delete('acc_delivery_note/{id}', [
    'as' => 'api_accdeliverynote_delete_acc_delivery_note',
    'uses'  => 'Controller@deleteAccDeliveryNote',
    'middleware' => [
      'auth:api',
    ],
]);
