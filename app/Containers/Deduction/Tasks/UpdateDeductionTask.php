<?php

namespace App\Containers\Deduction\Tasks;

use App\Containers\Deduction\Data\Repositories\DeductionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDeductionTask extends Task
{

    protected $repository;

    public function __construct(DeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

