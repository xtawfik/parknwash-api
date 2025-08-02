<?php

namespace App\Containers\AccExpenseClaimPayers\Tasks;

use App\Containers\AccExpenseClaimPayers\Data\Repositories\AccExpenseClaimPayersRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccExpenseClaimPayersTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimPayersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

