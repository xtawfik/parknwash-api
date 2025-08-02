<?php

namespace App\Containers\Deduction\Tasks;

use App\Containers\Deduction\Data\Repositories\DeductionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDeductionsTask extends Task
{

    protected $repository;

    public function __construct(DeductionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
