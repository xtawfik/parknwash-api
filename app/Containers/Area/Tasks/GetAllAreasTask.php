<?php

namespace App\Containers\Area\Tasks;

use App\Containers\Area\Data\Repositories\AreaRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAreasTask extends Task
{

    protected $repository;

    public function __construct(AreaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
