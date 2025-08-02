<?php

namespace App\Containers\AccEmployee\Tasks;

use App\Containers\AccEmployee\Data\Repositories\AccEmployeeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccEmployeeTask extends Task
{

    protected $repository;

    public function __construct(AccEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

