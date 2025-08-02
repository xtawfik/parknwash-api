<?php

namespace App\Containers\Order\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\CarModel\Models\CarModel;
use App\Containers\CarModel\UI\API\Transformers\CarModelTransformer;
use App\Containers\Country\Models\Country;
use App\Containers\Order\Models\Order;
use App\Containers\Order\Models\OrdersImport;
use App\Containers\Order\UI\API\Requests\CreateOrderRequest;
use App\Containers\Order\UI\API\Requests\DeleteOrderRequest;
use App\Containers\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Containers\Order\UI\API\Requests\GetAllOrdersRequest;
use App\Containers\Order\UI\API\Requests\UpdateOrderRequest;
use App\Containers\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class Controller
 *
 * @package App\Containers\Order\UI\API\Controllers
 */
class Controller extends ApiController {
  /**
   * @param CreateOrderRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function createOrder( CreateOrderRequest $request ) {
    $order = Apiato::call( 'Order@CreateOrderAction', [ $request ] );

    $this->uploadMedia( $order, "image", true );
    $this->uploadMedia( $order, "gallery" );
    $this->uploadMedia( $order, "file" );

    return $this->created( $this->transform( $order, OrderTransformer::class ) );
  }

  /**
   * @param FindOrderByIdRequest $request
   *
   * @return array
   */
  public function findOrderById( FindOrderByIdRequest $request ) {
    $order = Apiato::call( 'Order@FindOrderByIdAction', [ $request ] );

    return $this->transform( $order, OrderTransformer::class );
  }

  /**
   * @param GetAllOrdersRequest $request
   *
   * @return array
   */
  public function getAllOrders( GetAllOrdersRequest $request ) {
    $orders = Apiato::call( 'Order@GetAllOrdersAction', [ $request ] );

//    if(request("transform") == "dashboard_orders") {
//      return $orders;
//    }

    return $this->transform( $orders, OrderTransformer::class );
  }

  /**
   * @param UpdateOrderRequest $request
   *
   * @return array
   */
  public function updateOrder( UpdateOrderRequest $request ) {
    $order = Apiato::call( 'Order@UpdateOrderAction', [ $request ] );

    $this->uploadMedia( $order, "image", true );
    $this->uploadMedia( $order, "gallery" );
    $this->uploadMedia( $order, "file" );

    $response = $this->transform($order, OrderTransformer::class);
    $response['debug'] = $order->debug;
    return $response;
  }

  /**
   * @param DeleteOrderRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteOrder( DeleteOrderRequest $request ) {
    Apiato::call( 'Order@DeleteOrderAction', [ $request ] );

    return $this->noContent();
  }

  public function ordersSummary( Request $request ) {
    $m = $this->arabicToEnglish(request('month'));
    $y = $this->arabicToEnglish(request('year'));

    $start = Carbon::create(date("Y"), $m );

    if(request("year")) {
      $start = Carbon::create($y, $m );
    }

    $user   = Auth::user();

    $orders = Order::whereBetween( 'created_at', [Carbon::parse($start)->toDateString(), $start->endOfMonth()->toDateString()] );
    if($request->get('requestedBy') == "supervisor") {
      $orders->where( 'mall_id', $user->mall_id );
    }else{
      $orders->where( 'user_id', $user->id );
    }

    $total = $orders->sum( 'total' );
    $count = $orders->count();

    $country_id = $user->country_id;
    $country = Country::find(1);
    if($country_id) {
      $country = Country::find($country_id);
    }

    return [
      "total" => $total,
      "count" => $count,
      "country" => $country,
    ];
  }

  function arabicToEnglish( $string ) {
    return strtr( $string, array(
      '۰' => '0',
      '۱' => '1',
      '۲' => '2',
      '۳' => '3',
      '۴' => '4',
      '۵' => '5',
      '۶' => '6',
      '۷' => '7',
      '۸' => '8',
      '۹' => '9',
      '٠' => '0',
      '١' => '1',
      '٢' => '2',
      '٣' => '3',
      '٤' => '4',
      '٥' => '5',
      '٦' => '6',
      '٧' => '7',
      '٨' => '8',
      '٩' => '9'
    ) );
  }

  function _bulkUploadFromExcel( Request $request ) {
    $file = $request->file( 'file' );

    $array = Excel::toArray(new OrdersImport, $file);

    return $array;
  }

  function bulkUploadFromExcel( Request $request ) {
    $file = $request->file( 'file' );

    Excel::import(new OrdersImport, $file);

    return [
      "status" => "success"
    ];
  }

  public function calculateOrderPrice() {
    $order_details = Apiato::call('Order@CalculateOrderPriceAction');
    return [
      "data" => $order_details['price_data'],
    ];
  }
}


