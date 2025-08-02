<?php

/**
 * @apiGroup           Users
 * @apiName            updateUser
 * @api                {put} /v1/users/:id Update User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  password (optional)
 * @apiParam           {String}  name (optional)
 *
 * @apiUse             UserSuccessSingleResponse
 */

$router->post('social/check', [
    'as' => 'api_check_social_id',
    'uses'       => 'Controller@checkSocialId',
    'middleware' => [
//        'auth:api',
    ],
]);
