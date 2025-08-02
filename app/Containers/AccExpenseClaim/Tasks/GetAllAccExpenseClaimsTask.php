<?php

namespace App\Containers\AccExpenseClaim\Tasks;

use App\Containers\AccExpenseClaim\Data\Repositories\AccExpenseClaimRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccExpenseClaimsTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
