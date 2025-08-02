<?php

/**
 * @apiGroup           AccDeliveryNote
 * @apiName            findAccDeliveryNoteById
 *
 * @api                {GET} /v1/acc_delivery_note/:id Endpoint title here..
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
$router->get('acc_delivery_note/{id}', [
    'as' => 'api_accdeliverynote_find_acc_delivery_note_by_id',
    'uses'  => 'Controller@findAccDeliveryNoteById',
    'middleware' => [
      'auth:api',
    ],
]);
