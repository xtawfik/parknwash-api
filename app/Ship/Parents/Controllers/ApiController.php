<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\ApiController as AbstractApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Str;
use MediaUploader;

/**
 * Class ApiController.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class ApiController extends AbstractApiController {

  public function saveSorting() {
    $object = request('object');
    $startIndex = request('startIndex');
    $ids = request('ids');

    foreach ($ids as $index => $id) {
      Apiato::call("{$object}@Update{$object}Task", [$id, [
        'sorter' => $startIndex + $index
      ]]);
    }

    return $this->noContent();
  }

  public function uploadMedia( $models, $file, $single = false ) {
    $requestedFiles = request()->file( $file );
    if ( $requestedFiles ) {
      if ( ! is_array( $requestedFiles ) ) {
        $requestedFiles = [ $requestedFiles ];
      }

      foreach ( $requestedFiles as $requestedFile ) {
        $media = MediaUploader::fromSource( $requestedFile )->upload();

        if ( ! is_array( $models ) ) {
          $models = [ $models ];
        }

        foreach ( $models as $model ) {
          if ( $single ) {
            $model->syncMedia( $media, $file );
          } else {
            $model->attachMedia( $media, $file );
          }
        }
      }
    }
  }
}

