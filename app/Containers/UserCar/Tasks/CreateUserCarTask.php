<?php

namespace App\Containers\UserCar\Tasks;

use App\Containers\UserCar\Data\Repositories\UserCarRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateUserCarTask extends Task
{

    protected $repository;

    public function __construct(UserCarRepository $repository)
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

