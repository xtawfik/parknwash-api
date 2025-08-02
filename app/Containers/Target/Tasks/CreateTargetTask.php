<?php

namespace App\Containers\Target\Tasks;

use App\Containers\Target\Data\Repositories\TargetRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateTargetTask extends Task
{

    protected $repository;

    public function __construct(TargetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

