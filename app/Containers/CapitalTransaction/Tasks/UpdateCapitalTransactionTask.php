<?php

namespace App\Containers\CapitalTransaction\Tasks;

use App\Containers\CapitalTransaction\Data\Repositories\CapitalTransactionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCapitalTransactionTask extends Task
{

    protected $repository;

    public function __construct(CapitalTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

