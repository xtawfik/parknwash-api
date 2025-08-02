<?php

namespace App\Containers\GeneralOption\Tasks;

use App\Containers\GeneralOption\Data\Repositories\GeneralOptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateGeneralOptionTask extends Task
{

  protected $repository;

  public function __construct(GeneralOptionRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {

    if(!isset($data['name'])) {
      $data['name'] = $data['name_en'] . "\n" . $data['name_ar'];
    }

    $repository = $this->repository->create($data);

    #ManyToMany#

    return $repository;
  }
}

