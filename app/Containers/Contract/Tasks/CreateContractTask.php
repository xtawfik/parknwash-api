<?php

namespace App\Containers\Contract\Tasks;

use App\Containers\Contract\Data\Repositories\ContractRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateContractTask extends Task
{

    protected $repository;

    public function __construct(ContractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

