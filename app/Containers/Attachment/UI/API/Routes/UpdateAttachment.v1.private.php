<?php

/**
 * @apiGroup           Attachment
 * @apiName            updateAttachment
 *
 * @api                {POST} /v1/attachment/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('attachment/{id}', [
    'as' => 'api_attachment_update_attachment',
    'uses'  => 'Controller@updateAttachment',
    'middleware' => [
      'auth:api',
    ],
]);
