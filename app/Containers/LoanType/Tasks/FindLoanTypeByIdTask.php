<?php

namespace App\Containers\LoanType\Tasks;

use App\Containers\LoanType\Data\Repositories\LoanTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindLoanTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(LoanTypeRepository $repository)
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
