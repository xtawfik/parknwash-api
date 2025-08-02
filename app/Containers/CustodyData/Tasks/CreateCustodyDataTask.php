<?php

namespace App\Containers\CustodyData\Tasks;

use App\Containers\CustodyData\Data\Repositories\CustodyDataRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCustodyDataTask extends Task
{

    protected $repository;

    public function __construct(CustodyDataRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

