<?php

namespace App\Containers\Area\Tasks;

use App\Containers\Area\Data\Repositories\AreaRepository;
use App\Containers\Mall\Models\Mall;
use App\Ship\Parents\Tasks\Task;

class UpdateAreaTask extends Task {

  protected $repository;

  public function __construct( AreaRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( $id, array $data ) {
    $repository = $this->repository->update( $data, $id );

    if ( request()->has( "malls" ) ) {
      Mall::where('area_id', $id)->update([
        'area_id' => null
      ]);

      Mall::whereIn('id', request('malls'))->update([
        'area_id' => $id
      ]);
    }

    return $repository;
  }
}

