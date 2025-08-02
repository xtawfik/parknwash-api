<?php

namespace App\Containers\RevenueReport\Tasks;

use App\Containers\Order\Models\Order;
use App\Containers\RevenueReport\Data\Repositories\RevenueReportRepository;
use App\Containers\RevenueReport\Models\RevenueReport;
use App\Ship\Parents\Tasks\Task;
use Carbon\CarbonPeriod;

class CreateRevenueReportTask extends Task {

  protected $repository;

  public function __construct( RevenueReportRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $from_date = request( 'from_date' );
    $to_date   = request( 'to_date' );
    $mall      = request( 'mall_id' );

    $period = CarbonPeriod::create( $from_date, $to_date );

    foreach ( $period as $date ) {
      $the_date = $date->format( 'Y-m-d' );

      $check = RevenueReport::where( "date", $the_date )->where( 'mall_id', $mall )->first();

      // Get orders
      $sedan = Order::whereHas( 'service', function ( $query ) {
        $query->where( "car_id", 3 );
      } )->whereDate( 'created_at', $date )->where( "mall_id", $mall );

      $suv = Order::whereHas( 'service', function ( $query ) {
        $query->where( "car_id", 2 );
      } )->whereDate( 'created_at', $date )->where( "mall_id", $mall );

      $vip = Order::whereHas( 'service', function ( $query ) {
        $query->where( "car_id", 4 );
      } )->whereDate( 'created_at', $date )->where( "mall_id", $mall );

      $vvip = Order::whereHas( 'service', function ( $query ) {
        $query->where( "car_id", 5 );
      } )->whereDate( 'created_at', $date )->where( "mall_id", $mall );

      $data['sedan'] = $sedan->count();
      $data['jeep']  = $suv->count();
      $data['vip']   = $vip->count();
      $data['vvip']  = $vvip->count();

      $total_money = 0;

      foreach ( $sedan->get() as $order ) {
        $total_money += $order->service->price;
      }
      foreach ( $suv->get() as $order ) {
        $total_money += $order->service->price;
      }
      foreach ( $vip->get() as $order ) {
        $total_money += $order->service->price;
      }
      foreach ( $vvip->get() as $order ) {
        $total_money += $order->service->price;
      }

      $data['total_money'] = $total_money;
      $data['total_wash'] = $data['sedan'] + $data['jeep'] + $data['vip'] + $data['vvip'];

      if ( $check ) {
        $repository = $this->repository->update( $data, $check->id );
      } else {
        $data['date'] = $the_date;
        $data['net_sale'] = $total_money;
        $data['subscription'] = 0;
//        $data['expenses'] = 0;

        $repository   = $this->repository->create( $data );
      }
    }

    return $repository;
  }
}
