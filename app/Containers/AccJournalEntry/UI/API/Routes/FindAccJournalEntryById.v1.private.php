<?php

/**
 * @apiGroup           AccJournalEntry
 * @apiName            findAccJournalEntryById
 *
 * @api                {GET} /v1/acc_journal_entry/:id Endpoint title here..
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
$router->get('acc_journal_entry/{id}', [
    'as' => 'api_accjournalentry_find_acc_journal_entry_by_id',
    'uses'  => 'Controller@findAccJournalEntryById',
    'middleware' => [
      'auth:api',
    ],
]);
