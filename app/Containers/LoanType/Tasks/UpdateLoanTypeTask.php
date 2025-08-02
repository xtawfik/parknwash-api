<?php

namespace App\Containers\LoanType\Tasks;

use App\Containers\LoanType\Data\Repositories\LoanTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateLoanTypeTask extends Task
{

    protected $repository;

    public function __construct(LoanTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

