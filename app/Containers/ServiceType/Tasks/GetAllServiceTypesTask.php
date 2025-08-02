<?php

namespace App\Containers\ServiceType\Tasks;

use App\Containers\ServiceType\Data\Repositories\ServiceTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllServiceTypesTask extends Task
{

    protected $repository;

    public function __construct(ServiceTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
