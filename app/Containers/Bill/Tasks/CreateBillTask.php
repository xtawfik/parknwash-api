<?php

namespace App\Containers\Bill\Tasks;

use App\Containers\Bill\Data\Repositories\BillRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBillTask extends Task
{

    protected $repository;

    public function __construct(BillRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

