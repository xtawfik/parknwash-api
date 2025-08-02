<?php

namespace App\Containers\Area\Tasks;

use App\Containers\Area\Data\Repositories\AreaRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAreaByIdTask extends Task
{

    protected $repository;

    public function __construct(AreaRepository $repository)
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
