<?php

namespace App\Containers\UserCar\Tasks;

use App\Containers\UserCar\Data\Repositories\UserCarRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateUserCarTask extends Task
{

    protected $repository;

    public function __construct(UserCarRepository $repository)
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

