<?php

namespace App\Containers\Order\Tasks;

use App\Containers\Order\Data\Criterias\EmployeeActiveOrderCriteria;
use App\Containers\Order\Data\Criterias\EmployeeDailyOrderCriteria;
use App\Containers\Order\Data\Repositories\OrderRepository;
use App\Ship\Criterias\Eloquent\AreaSupervisorCriteria;
use App\Ship\Criterias\Eloquent\CurrentCountryCriteria;
use App\Ship\Criterias\Eloquent\NotNullCriteria;
use App\Ship\Criterias\Eloquent\OrderFilterCriteria;
use App\Ship\Criterias\Eloquent\ThisBetweenDatesCriteria;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GetAllOrdersTask extends Task {

  protected $repository;

  public function __construct( OrderRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    if ( request( 'requestedBy' ) == "report" ) {
      $this->repository->pushCriteria( new ThisUserCriteria );
      $this->repository->pushCriteria( new ThisBetweenDatesCriteria( 'created_at', Carbon::today(), Carbon::tomorrow() ) );
    }

    if ( request( 'requestedBy' ) == "employee" ) {
      $month = Carbon::create(date("Y"), request('month') );
      if(request("year")) {
        $month = Carbon::create(request('year'), request('month') );
      }

      $this->repository->pushCriteria( new ThisBetweenDatesCriteria( 'created_at', Carbon::parse($month), $month->endOfMonth() ) );
      $this->repository->pushCriteria( new ThisUserCriteria );
    }

    // Active orders for employee
    if ( request( 'requestedBy' ) == "active" ) {
      $this->repository->pushCriteria( new EmployeeActiveOrderCriteria );
    }

    // Daily orders for employee
    if ( request( 'requestedBy' ) == "daily" ) {
      $this->repository->pushCriteria( new EmployeeDailyOrderCriteria );
    }

    if ( request( 'requestedBy' ) == "supervisor" ) {
      $m = $this->arabicToEnglish(request('month'));
      $y = $this->arabicToEnglish(request('year'));

      $month = Carbon::create(date("Y"), $m );

      if(request("year")) {
        $month = Carbon::create($y, $m );
      }

      $this->repository->pushCriteria( new ThisBetweenDatesCriteria( 'created_at', Carbon::parse($month), $month->endOfMonth() ) );
      $this->repository->pushCriteria( new ThisEqualThatCriteria('mall_id', Auth::user()->mall_id) );
    }

    if ( request( 'requestedBy' ) == "client" or request( 'requestedBy' ) == "mobile" ) {
      $this->repository->pushCriteria( new ThisEqualThatCriteria('client_id', Auth::user()->id) );
      $this->repository->pushCriteria( new OrderFilterCriteria() );
    }

    if ( request( 'requestedBy' ) == "dashboard" ) {
//      $this->repository->pushCriteria( new CurrentCountryCriteria() );
//      $this->repository->pushCriteria( new AreaSupervisorCriteria() );
    }

    return $this->repository->paginate();
  }
}
