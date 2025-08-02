<?php

namespace App\Containers\HandOver\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HandOver\Models\HandOver;
use App\Containers\HandOver\UI\API\Requests\CreateHandOverRequest;
use App\Containers\HandOver\UI\API\Requests\DeleteHandOverRequest;
use App\Containers\HandOver\UI\API\Requests\FindHandOverByIdRequest;
use App\Containers\HandOver\UI\API\Requests\GetAllHandOversRequest;
use App\Containers\HandOver\UI\API\Requests\UpdateHandOverRequest;
use App\Containers\HandOver\UI\API\Transformers\HandOverTransformer;
use App\Containers\Order\Models\Order;
use App\Ship\Parents\Controllers\ApiController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 *
 * @package App\Containers\HandOver\UI\API\Controllers
 */
class Controller extends ApiController {
  /**
   * @param CreateHandOverRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function createHandOver( CreateHandOverRequest $request ) {
    $handover = Apiato::call( 'HandOver@CreateHandOverAction', [ $request ] );

    $this->uploadMedia( $handover, "image", true );
    $this->uploadMedia( $handover, "gallery" );
    $this->uploadMedia( $handover, "file" );

    return $this->created( $this->transform( $handover, HandOverTransformer::class ) );
  }

  /**
   * @param FindHandOverByIdRequest $request
   *
   * @return array
   */
  public function findHandOverById( FindHandOverByIdRequest $request ) {
    $handover = Apiato::call( 'HandOver@FindHandOverByIdAction', [ $request ] );

    return $this->transform( $handover, HandOverTransformer::class );
  }

  /**
   * @param GetAllHandOversRequest $request
   *
   * @return array
   */
  public function getAllHandOvers( GetAllHandOversRequest $request ) {
    $handovers = Apiato::call( 'HandOver@GetAllHandOversAction', [ $request ] );

    return $this->transform( $handovers, HandOverTransformer::class );
  }

  /**
   * @param UpdateHandOverRequest $request
   *
   * @return array
   */
  public function updateHandOver( UpdateHandOverRequest $request ) {
    $handover = Apiato::call( 'HandOver@UpdateHandOverAction', [ $request ] );

    $this->uploadMedia( $handover, "image", true );
    $this->uploadMedia( $handover, "gallery" );
    $this->uploadMedia( $handover, "file" );

    return $this->transform( $handover, HandOverTransformer::class );
  }

  /**
   * @param DeleteHandOverRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteHandOver( DeleteHandOverRequest $request ) {
    Apiato::call( 'HandOver@DeleteHandOverAction', [ $request ] );

    return $this->noContent();
  }

  public function daily() {
    $user = Auth::user();
    $total = Order::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->where('payment_method', 'cash')->sum('total');

    $check = HandOver::whereDate( 'created_at', Carbon::today() )->where( 'employee_id', Auth::id() )->first();

    return [
      'total' => $total,
      'country' => $user->country,
      'status' => $check ?: "not-requested"
    ];
  }
}
