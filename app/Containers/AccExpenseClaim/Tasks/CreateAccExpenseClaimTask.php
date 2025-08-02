<?php

namespace App\Containers\AccExpenseClaim\Tasks;

use App\Containers\AccExpenseClaim\Data\Repositories\AccExpenseClaimRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccExpenseClaimTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

