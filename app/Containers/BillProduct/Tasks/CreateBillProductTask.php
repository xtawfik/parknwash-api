<?php

namespace App\Containers\BillProduct\Tasks;

use App\Containers\BillProduct\Data\Repositories\BillProductRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBillProductTask extends Task
{

    protected $repository;

    public function __construct(BillProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

