<?php

namespace App\Containers\AccExpenseClaim\Tasks;

use App\Containers\AccExpenseClaim\Data\Repositories\AccExpenseClaimRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccExpenseClaimTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
