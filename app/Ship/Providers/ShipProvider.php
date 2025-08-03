<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainProvider;

use Maatwebsite\Excel\Sheet;

/**
 * Class ShipProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ShipProvider extends MainProvider {

  /**
   * Register any Service Providers on the Ship layer (including third party packages).
   *
   * @var array
   */
  public $serviceProviders = [
    // ...
  ];

  /**
   * Register any Alias on the Ship layer (including third party packages).
   *
   * @var  array
   */
  protected $aliases = [
    // ...
  ];

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    // ...
    parent::boot();
    // ...
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    /**
     * Load the ide-helper service provider only in non production environments.
     */
    if ( $this->app->environment() !== 'production' ) {
      $this->app->register( \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class );
    }

    Sheet::macro( 'styleCells', function ( Sheet $sheet, string $cellRange, array $style ) {
      $sheet->getDelegate()->getStyle( $cellRange )->applyFromArray( $style );
    } );

    parent::register();
  }

}
