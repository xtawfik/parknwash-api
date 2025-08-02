<?php

namespace App\Containers\Service\Tasks;

use App\Containers\Service\Data\Repositories\ServiceRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindServiceByIdTask extends Task
{

    protected $repository;

    public function __construct(ServiceRepository $repository)
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
