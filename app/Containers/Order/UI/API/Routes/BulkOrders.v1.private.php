<?php
/** @var Route $router */
$router->post('app/bulkorders', [
    'as' => 'api_bulkorders',
    'uses'  => 'BulkOrdersController@check',
    'middleware' => [
      'auth:api',
    ],
]);
