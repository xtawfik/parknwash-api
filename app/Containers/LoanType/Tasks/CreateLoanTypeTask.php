<?php

namespace App\Containers\LoanType\Tasks;

use App\Containers\LoanType\Data\Repositories\LoanTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateLoanTypeTask extends Task
{

    protected $repository;

    public function __construct(LoanTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

