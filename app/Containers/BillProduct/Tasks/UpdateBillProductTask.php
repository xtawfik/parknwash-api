<?php

namespace App\Containers\BillProduct\Tasks;

use App\Containers\BillProduct\Data\Repositories\BillProductRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateBillProductTask extends Task
{

    protected $repository;

    public function __construct(BillProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

