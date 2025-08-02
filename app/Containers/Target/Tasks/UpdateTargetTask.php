<?php

namespace App\Containers\Target\Tasks;

use App\Containers\Target\Data\Repositories\TargetRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateTargetTask extends Task
{

    protected $repository;

    public function __construct(TargetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

