<?php
/** @var Route $router */
$router->post( 'users/save-sort', [
  'as'         => 'api_save_sorting',
  'uses'       => 'Controller@saveSorting',
  'middleware' => [
    'auth:api',
  ],
] );
