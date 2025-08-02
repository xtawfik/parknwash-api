<?php
/** @var Route $router */
$router->post( 'category/save-sort', [
  'as'         => 'api_save_sorting',
  'uses'       => 'Controller@saveSorting',
  'middleware' => [
    'auth:api',
  ],
] );
