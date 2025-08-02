<?php

namespace App\Containers\HandOver\Tasks;

use App\Containers\HandOver\Data\Repositories\HandOverRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateHandOverTask extends Task
{

    protected $repository;

    public function __construct(HandOverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

