<?php

/**
 * @apiGroup           AccCreditNote
 * @apiName            findAccCreditNoteById
 *
 * @api                {GET} /v1/acc_credit_note/:id Endpoint title here..
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
$router->get('acc_credit_note/{id}', [
    'as' => 'api_acccreditnote_find_acc_credit_note_by_id',
    'uses'  => 'Controller@findAccCreditNoteById',
    'middleware' => [
      'auth:api',
    ],
]);
