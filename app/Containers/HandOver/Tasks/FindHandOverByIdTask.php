<?php

namespace App\Containers\HandOver\Tasks;

use App\Containers\HandOver\Data\Repositories\HandOverRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindHandOverByIdTask extends Task
{

    protected $repository;

    public function __construct(HandOverRepository $repository)
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
