<?php

namespace App\Containers\Target\Tasks;

use App\Containers\Target\Data\Repositories\TargetRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindTargetByIdTask extends Task
{

    protected $repository;

    public function __construct(TargetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
