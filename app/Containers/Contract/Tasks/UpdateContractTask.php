<?php

namespace App\Containers\Contract\Tasks;

use App\Containers\Contract\Data\Repositories\ContractRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateContractTask extends Task
{

    protected $repository;

    public function __construct(ContractRepository $repository)
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

