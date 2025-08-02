<?php

namespace App\Containers\GeneralOption\Tasks;

use App\Containers\GeneralOption\Data\Repositories\GeneralOptionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateGeneralOptionTask extends Task
{

  protected $repository;

  public function __construct(GeneralOptionRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run($id, array $data)
  {
    if (!isset($data['name']) and !isset($data['sorter'])) {
      $data['name'] = $data['name_en'] . " (" . $data['name_ar'] . ")";
    }

    $repository = $this->repository->update($data, $id);

    #ManyToMany#

    return $repository;
  }
}

