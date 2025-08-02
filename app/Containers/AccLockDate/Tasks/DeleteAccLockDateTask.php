<?php

namespace App\Containers\AccLockDate\Tasks;

use App\Containers\AccLockDate\Data\Repositories\AccLockDateRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccLockDateTask extends Task
{

    protected $repository;

    public function __construct(AccLockDateRepository $repository)
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
