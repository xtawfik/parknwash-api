<?php
/** @var Route $router */
$router->post( 'product/save-sort', [
  'as'         => 'api_save_sorting',
  'uses'       => 'Controller@saveSorting',
  'middleware' => [
    'auth:api',
  ],
] );
