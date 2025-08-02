<?php

/**
 * @apiGroup           AccDeliveryNote
 * @apiName            updateAccDeliveryNote
 *
 * @api                {POST} /v1/acc_delivery_note/:id Endpoint title here..
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
$router->post('acc_delivery_note/{id}', [
    'as' => 'api_accdeliverynote_update_acc_delivery_note',
    'uses'  => 'Controller@updateAccDeliveryNote',
    'middleware' => [
      'auth:api',
    ],
]);
