<?php

namespace App\Containers\EmployeeCost\Tasks;

use App\Containers\EmployeeCost\Data\Repositories\EmployeeCostRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEmployeeCostTask extends Task
{

  protected $repository;

  public function __construct(EmployeeCostRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run($id, array $data)
  {
    // Request from inline edit
    if (isset($data['inlineEdit'])) {
      $item = $this->repository->find($id);
      $data['total'] = $this->calculateTotal($data, $item);
    }

    return $this->repository->update($data, $id);
  }

  function calculateTotal($data, $item) {
    $total = 0;

    for ($i = 1; $i <= 41; $i++) {
      $total += $data['EC' . str_pad($i, 2, '0', STR_PAD_LEFT)] ?? $item['EC' . str_pad($i, 2, '0', STR_PAD_LEFT)];
    }

    return $total;
  }
}

