<?php

namespace App\Containers\AccExpenseClaim\Tasks;

use App\Containers\AccExpenseClaim\Data\Repositories\AccExpenseClaimRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccExpenseClaimByIdTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimRepository $repository)
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
