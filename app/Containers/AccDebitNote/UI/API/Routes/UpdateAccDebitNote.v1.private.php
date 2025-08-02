<?php

/**
 * @apiGroup           AccDebitNote
 * @apiName            updateAccDebitNote
 *
 * @api                {POST} /v1/acc_debit_note/:id Endpoint title here..
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
$router->post('acc_debit_note/{id}', [
    'as' => 'api_accdebitnote_update_acc_debit_note',
    'uses'  => 'Controller@updateAccDebitNote',
    'middleware' => [
      'auth:api',
    ],
]);
