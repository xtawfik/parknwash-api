<?php

namespace App\Containers\CarModel\Tasks;

use App\Containers\CarModel\Data\Repositories\CarModelRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCarModelsTask extends Task
{

  protected $repository;

  public function __construct(CarModelRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    return $this->repository->paginate();
  }
}
