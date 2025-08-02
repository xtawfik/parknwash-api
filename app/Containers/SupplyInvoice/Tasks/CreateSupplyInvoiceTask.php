<?php

namespace App\Containers\SupplyInvoice\Tasks;

use App\Containers\SupplyInvoice\Data\Repositories\SupplyInvoiceRepository;
use App\Containers\Warehouse\Models\Warehouse;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSupplyInvoiceTask extends Task {

  protected $repository;

  public function __construct( SupplyInvoiceRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    // update the warehouse stock, search Warehouse for supply_id and country_id
    $warehouse = Warehouse::where( "supply_id", $data[ "supply_id" ] )
      ->where( "country_id", $data[ "country_id" ] )
      ->first();

    // if warehouse is not found, create one
    if ( ! $warehouse ) {
      $warehouse = new Warehouse();
      $warehouse->supply_id = $data[ "supply_id" ];
      $warehouse->country_id = $data[ "country_id" ];
      $warehouse->total_quantity = 0;
      $warehouse->out_quantity = 0;
      $warehouse->damaged_quantity = 0;
      $warehouse->bin_location = "";
      $warehouse->save();
    }

    // update the warehouse stock
    $warehouse->total_quantity = $warehouse->total_quantity + $data[ "quantity" ];
    $warehouse->save();



    return $repository;
  }
}

