<?php
/** @var Route $router */
$router->post( 'job_card/save-sort', [
  'as'         => 'api_save_sorting',
  'uses'       => 'Controller@saveSorting',
  'middleware' => [
    'auth:api',
  ],
] );
