<?php

namespace App\Containers\ServiceType\Tasks;

use App\Containers\ServiceType\Data\Repositories\ServiceTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindServiceTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(ServiceTypeRepository $repository)
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
