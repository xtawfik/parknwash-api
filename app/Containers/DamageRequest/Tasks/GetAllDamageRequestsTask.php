<?php

namespace App\Containers\DamageRequest\Tasks;

use App\Containers\DamageRequest\Data\Repositories\DamageRequestRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDamageRequestsTask extends Task
{

    protected $repository;

    public function __construct(DamageRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
