<?php

namespace App\Containers\Deduction\Tasks;

use App\Containers\Deduction\Data\Repositories\DeductionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindDeductionByIdTask extends Task
{

    protected $repository;

    public function __construct(DeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
