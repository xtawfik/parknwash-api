<?php
/** @var Route $router */
$router->post('app/job-cards', [
    'as' => 'api_jobcards',
    'uses'  => 'JobCardsController@check',
    'middleware' => [
      'auth:api',
    ],
]);
