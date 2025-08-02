<?php

namespace App\Containers\UserCar\Tasks;

use App\Containers\UserCar\Data\Repositories\UserCarRepository;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllUserCarsTask extends Task
{

  protected $repository;

  public function __construct(UserCarRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    $this->repository->pushCriteria(new ThisUserCriteria);
    return $this->repository->paginate();
  }
}
