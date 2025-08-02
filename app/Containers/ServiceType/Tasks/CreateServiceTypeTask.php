<?php

namespace App\Containers\ServiceType\Tasks;

use App\Containers\ServiceType\Data\Repositories\ServiceTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateServiceTypeTask extends Task
{

    protected $repository;

    public function __construct(ServiceTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

