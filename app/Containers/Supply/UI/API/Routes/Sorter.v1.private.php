<?php
/** @var Route $router */
$router->post( 'supply/save-sort', [
  'as'         => 'api_save_sorting',
  'uses'       => 'Controller@saveSorting',
  'middleware' => [
    'auth:api',
  ],
] );
