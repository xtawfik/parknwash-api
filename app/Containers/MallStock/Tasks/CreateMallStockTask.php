<?php

namespace App\Containers\MallStock\Tasks;

use App\Containers\Mall\Models\Mall;
use App\Containers\MallStock\Data\Repositories\MallStockRepository;
use App\Containers\Warehouse\Models\Warehouse;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMallStockTask extends Task {

  protected $repository;

  public function __construct( MallStockRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {

    $mall               = Mall::find( $data['mall_id'] );
    $data['country_id'] = $mall->country_id;

    // Find if this mall has already a stock
    $mallStock = $this->repository->findWhere( [
      'mall_id'    => $data['mall_id'],
      'country_id' => $data['country_id'],
      'supply_id'  => $data['supply_id'],
    ] );

    $quantity = $data['quantity'];

    // Subtract the quantity from warehouse
    $warehouseProduct = Warehouse::find( $data['warehouse_id'] );
    $warehouseProduct->decrement( 'total_quantity', $quantity );
    $warehouseProduct->increment( 'out_quantity', $quantity );

    // If it has a stock, then update it
    if ( $mallStock->count() > 0 ) {
      $mallStock = $mallStock->first();

      // Update the quantity
      $updatedQuantity        = $mallStock->real_quantity + $quantity;
      $data['real_quantity']  = $updatedQuantity;
      $data['total_quantity'] = $updatedQuantity;

      return $this->repository->update( $data, $mallStock->id );
    }

    // If it doesn't have a stock, then create it
    $data['real_quantity']  = $quantity;
    $data['total_quantity'] = $quantity;

    return $this->repository->create( $data );
  }
}

