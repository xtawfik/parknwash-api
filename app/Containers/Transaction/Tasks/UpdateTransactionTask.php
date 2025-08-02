<?php

namespace App\Containers\Transaction\Tasks;

use App\Containers\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateTransactionTask extends Task
{

    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

