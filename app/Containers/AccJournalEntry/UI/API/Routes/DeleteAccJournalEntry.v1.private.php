<?php

/**
 * @apiGroup           AccJournalEntry
 * @apiName            deleteAccJournalEntry
 *
 * @api                {DELETE} /v1/acc_journal_entry/:id Endpoint title here..
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
$router->delete('acc_journal_entry/{id}', [
    'as' => 'api_accjournalentry_delete_acc_journal_entry',
    'uses'  => 'Controller@deleteAccJournalEntry',
    'middleware' => [
      'auth:api',
    ],
]);
