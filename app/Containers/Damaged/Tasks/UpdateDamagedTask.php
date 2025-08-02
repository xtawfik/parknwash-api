<?php

namespace App\Containers\Damaged\Tasks;

use App\Containers\Damaged\Data\Repositories\DamagedRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDamagedTask extends Task
{

    protected $repository;

    public function __construct(DamagedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

