<?php

namespace App\Containers\Damaged\Tasks;

use App\Containers\Damaged\Data\Repositories\DamagedRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDamagedsTask extends Task
{

    protected $repository;

    public function __construct(DamagedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
