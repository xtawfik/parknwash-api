<?php

$router->get('/payslip/{id}', [
    'as'   => 'get_payslip',
    'uses' => 'Controller@generatePayslip',
]);

$router->get('/payslip-send/{id}', [
    'as'   => 'send_payslip',
    'uses' => 'Controller@payslipSend',
]);
