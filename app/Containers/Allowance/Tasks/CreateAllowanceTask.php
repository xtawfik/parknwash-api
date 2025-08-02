<?php

namespace App\Containers\Allowance\Tasks;

use App\Containers\Allowance\Data\Repositories\AllowanceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAllowanceTask extends Task
{

    protected $repository;

    public function __construct(AllowanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

