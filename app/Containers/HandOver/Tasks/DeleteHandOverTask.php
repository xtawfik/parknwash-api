<?php

namespace App\Containers\HandOver\Tasks;

use App\Containers\HandOver\Data\Repositories\HandOverRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteHandOverTask extends Task
{

    protected $repository;

    public function __construct(HandOverRepository $repository)
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
