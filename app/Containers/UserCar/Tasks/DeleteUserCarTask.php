<?php

namespace App\Containers\UserCar\Tasks;

use App\Containers\UserCar\Data\Repositories\UserCarRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteUserCarTask extends Task
{

    protected $repository;

    public function __construct(UserCarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
