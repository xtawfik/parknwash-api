<?php

namespace App\Containers\CapitalTransaction\Tasks;

use App\Containers\CapitalTransaction\Data\Repositories\CapitalTransactionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCapitalTransactionTask extends Task
{

    protected $repository;

    public function __construct(CapitalTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

