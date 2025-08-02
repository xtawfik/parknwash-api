<?php

namespace App\Containers\Loan\Tasks;

use App\Containers\Loan\Data\Repositories\LoanRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindLoanByIdTask extends Task
{

    protected $repository;

    public function __construct(LoanRepository $repository)
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
