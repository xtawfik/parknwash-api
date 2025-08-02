<?php

namespace App\Containers\Target\Tasks;

use App\Containers\Target\Data\Repositories\TargetRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteTargetTask extends Task
{

    protected $repository;

    public function __construct(TargetRepository $repository)
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
