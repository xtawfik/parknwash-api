<?php

namespace App\Containers\AccExpenseClaimPayers\Tasks;

use App\Containers\AccExpenseClaimPayers\Data\Repositories\AccExpenseClaimPayersRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccExpenseClaimPayersTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimPayersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
