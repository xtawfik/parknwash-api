<?php

/**
 * @apiGroup           AccDebitNote
 * @apiName            createAccDebitNote
 *
 * @api                {POST} /v1/acc_debit_note Endpoint title here..
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
$router->post('acc_debit_note', [
    'as' => 'api_accdebitnote_create_acc_debit_note',
    'uses'  => 'Controller@createAccDebitNote',
    'middleware' => [
      'auth:api',
    ],
]);
