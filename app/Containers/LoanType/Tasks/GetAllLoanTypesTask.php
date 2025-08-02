<?php

namespace App\Containers\LoanType\Tasks;

use App\Containers\LoanType\Data\Repositories\LoanTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllLoanTypesTask extends Task
{

    protected $repository;

    public function __construct(LoanTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
