<?php

namespace App\Containers\Target\Tasks;

use App\Containers\Target\Data\Repositories\TargetRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllTargetsTask extends Task
{

    protected $repository;

    public function __construct(TargetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
