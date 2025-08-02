<?php

namespace App\Ship\Middlewares\Http;

use Closure;

class Cors {
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    $response->headers->set('Access-Control-Allow-Origin' , '*');
    $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
    $response->headers->set('Access-Control-Allow-Headers', '*');

    return $response;
  }
}
