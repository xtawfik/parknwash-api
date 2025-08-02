<?php

namespace App\Containers\AccExpenseClaimPayers\Tasks;

use App\Containers\AccExpenseClaimPayers\Data\Repositories\AccExpenseClaimPayersRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccExpenseClaimPayersTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimPayersRepository $repository)
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
