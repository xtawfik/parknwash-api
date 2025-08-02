<?php

namespace App\Containers\Loan\Tasks;

use App\Containers\Loan\Data\Repositories\LoanRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateLoanTask extends Task
{

    protected $repository;

    public function __construct(LoanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

