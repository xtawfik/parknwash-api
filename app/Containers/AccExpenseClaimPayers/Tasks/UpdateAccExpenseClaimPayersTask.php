<?php

namespace App\Containers\AccExpenseClaimPayers\Tasks;

use App\Containers\AccExpenseClaimPayers\Data\Repositories\AccExpenseClaimPayersRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccExpenseClaimPayersTask extends Task
{

    protected $repository;

    public function __construct(AccExpenseClaimPayersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

