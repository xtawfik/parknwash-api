<?php

namespace App\Containers\Order\UI\CLI\Commands;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Commands\ConsoleCommand;
use App\Ship\Transporters\DataTransporter;
use DB;

/**
 * Class SyncOrdersTable
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class SyncOrdersTable extends ConsoleCommand {

  protected $signature = 'orders:sync';

  protected $description = 'Sync orders from old db to new db';

  /**
   * @void
   */
  public function handle() {
    // Get the last inserted order ID from the beta database
    $lastInsertedOrderId = DB::connection( 'mysql' )
                             ->table( 'order' )
                             ->orderByDesc( 'id' )
                             ->value( 'id' );

    $this->info( $lastInsertedOrderId );

    // Get new orders from the live database
    $newOrders = DB::connection( 'old_db' )
                   ->table( 'order' )
                   ->where( 'id', '>', $lastInsertedOrderId )
                   ->get();

    if ( $newOrders->isEmpty() ) {
      $this->info( 'No new orders to sync.' );

      return;
    }

    $this->info( 'New orders to sync: ' . count( $newOrders ) );

    // Insert new orders into the beta database
    foreach ( $newOrders as $newOrder ) {
      $orderArray = (array) $newOrder;

      // add status to complete
      $orderArray['status'] = 'completed';

      DB::connection( 'mysql' )
        ->table( 'order' )
        ->insert( $orderArray );

      $this->info( 'Synced order ' . $newOrder->id );
    }
  }
}
