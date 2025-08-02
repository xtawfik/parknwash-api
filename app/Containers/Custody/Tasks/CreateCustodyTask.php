<?php

namespace App\Containers\Custody\Tasks;

use App\Containers\Custody\Data\Repositories\CustodyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCustodyTask extends Task
{

    protected $repository;

    public function __construct(CustodyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

