<?php

namespace App\Containers\DamageRequest\Tasks;

use App\Containers\DamageRequest\Data\Repositories\DamageRequestRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDamageRequestTask extends Task
{

    protected $repository;

    public function __construct(DamageRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

