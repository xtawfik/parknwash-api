<?php

namespace App\Containers\ClientOrder\Tasks;

use App\Containers\ClientOrder\Data\Repositories\ClientOrderRepository;
use App\Ship\Parents\Tasks\Task;

class CreateClientOrderTask extends Task {

  protected $repository;

  public function __construct( ClientOrderRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    $cart = request( 'cart' );
    foreach ( $cart as $item ) {
      $product = $repository->products()->create( [
        'product_id' => $item['id'],
        'price'      => $item['price'],
        'quantity'      => $item['quantity'],
      ] );

      foreach ( $item['options'] as $option ) {
        $product->order_options()->create( [
          'option_id' => $option['id'],
          'price'     => $option['price']
        ] );
      }
    }

    return $repository;
  }
}

