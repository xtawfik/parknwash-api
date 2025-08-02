<?php

namespace App\Containers\DamageRequest\Tasks;

use App\Containers\DamageRequest\Data\Repositories\DamageRequestRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDamageRequestTask extends Task
{

    protected $repository;

    public function __construct(DamageRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

