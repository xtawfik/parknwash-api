<?php

namespace App\Containers\Custody\Tasks;

use App\Containers\Custody\Data\Repositories\CustodyRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCustodyTask extends Task
{

    protected $repository;

    public function __construct(CustodyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

