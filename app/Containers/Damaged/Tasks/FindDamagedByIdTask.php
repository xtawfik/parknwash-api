<?php

namespace App\Containers\Damaged\Tasks;

use App\Containers\Damaged\Data\Repositories\DamagedRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindDamagedByIdTask extends Task
{

    protected $repository;

    public function __construct(DamagedRepository $repository)
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
