<?php

namespace App\Containers\AccEmployee\Tasks;

use App\Containers\AccEmployee\Data\Repositories\AccEmployeeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccEmployeeTask extends Task
{

    protected $repository;

    public function __construct(AccEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

