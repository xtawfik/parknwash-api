<?php

namespace App\Containers\CapitalTransaction\Tasks;

use App\Containers\CapitalTransaction\Data\Repositories\CapitalTransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCapitalTransactionByIdTask extends Task
{

    protected $repository;

    public function __construct(CapitalTransactionRepository $repository)
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
