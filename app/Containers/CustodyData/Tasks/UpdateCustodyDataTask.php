<?php

namespace App\Containers\CustodyData\Tasks;

use App\Containers\CustodyData\Data\Repositories\CustodyDataRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCustodyDataTask extends Task
{

    protected $repository;

    public function __construct(CustodyDataRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

