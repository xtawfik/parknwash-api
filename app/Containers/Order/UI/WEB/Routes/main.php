<?php

$router->get('/invoice/{id}', [
    'as'   => 'get_order_invoice',
    'uses' => 'Controller@getInvoice',
]);
