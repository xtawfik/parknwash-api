<?php

namespace App\Containers\Bill\Tasks;

use App\Containers\Bill\Data\Repositories\BillRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateBillTask extends Task
{

    protected $repository;

    public function __construct(BillRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

