<?php

namespace App\Containers\Target\UI\API\Controllers;

use App\Containers\Target\UI\API\Requests\CreateTargetRequest;
use App\Containers\Target\UI\API\Requests\DeleteTargetRequest;
use App\Containers\Target\UI\API\Requests\GetAllTargetsRequest;
use App\Containers\Target\UI\API\Requests\FindTargetByIdRequest;
use App\Containers\Target\UI\API\Requests\UpdateTargetRequest;
use App\Containers\Target\UI\API\Transformers\TargetTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Target\UI\API\Controllers
 */
class Controller extends ApiController {
  /**
   * @param CreateTargetRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function createTarget( CreateTargetRequest $request ) {
    $target = Apiato::call( 'Target@CreateTargetAction', [ $request ] );

    $this->uploadMedia( $target, "image", true );
    $this->uploadMedia( $target, "gallery" );
    $this->uploadMedia( $target, "file" );

    return $this->created( $this->transform( $target, TargetTransformer::class ) );
  }

  /**
   * @param FindTargetByIdRequest $request
   *
   * @return array
   */
  public function findTargetById( FindTargetByIdRequest $request ) {
    $target = Apiato::call( 'Target@FindTargetByIdAction', [ $request ] );

    return $this->transform( $target, TargetTransformer::class );
  }

  /**
   * @param GetAllTargetsRequest $request
   *
   * @return array
   */
  public function getAllTargets( GetAllTargetsRequest $request ) {
    $targets = Apiato::call( 'Target@GetAllTargetsAction', [ $request ] );

    return $this->transform( $targets, TargetTransformer::class );
  }

  /**
   * @param UpdateTargetRequest $request
   *
   * @return array
   */
  public function updateTarget( UpdateTargetRequest $request ) {
    $target = Apiato::call( 'Target@UpdateTargetAction', [ $request ] );

    $this->uploadMedia( $target, "image", true );
    $this->uploadMedia( $target, "gallery" );
    $this->uploadMedia( $target, "file" );

    return $this->transform( $target, TargetTransformer::class );
  }

  /**
   * @param DeleteTargetRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteTarget( DeleteTargetRequest $request ) {
    Apiato::call( 'Target@DeleteTargetAction', [ $request ] );

    return $this->noContent();
  }

  public function targetCalculation( GetAllTargetsRequest $request ) {
    $targets = Apiato::call( 'Target@GetAllTargetsAction', [ $request ] );

    return $this->transform( $targets, TargetTransformer::class );
  }

}
