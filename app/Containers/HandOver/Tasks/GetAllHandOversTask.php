<?php

namespace App\Containers\HandOver\Tasks;

use App\Containers\HandOver\Data\Repositories\HandOverRepository;
use App\Ship\Criterias\Eloquent\ThisBetweenDatesCriteria;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisEqualThatDateCriteria;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GetAllHandOversTask extends Task {

  protected $repository;

  public function __construct( HandOverRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {

    if ( request( 'requestedBy' ) == "supervisor" and request( "date" ) ) {
      $this->repository->pushCriteria( new ThisEqualThatDateCriteria( 'created_at', request( "date" ) ) );
      $this->repository->pushCriteria( new ThisEqualThatCriteria( 'mall_id', Auth::user()->mall_id ) );
    }

    return $this->repository->paginate();
  }
}
