<?php

namespace App\Containers\AccLockDate\Tasks;

use App\Containers\AccLockDate\Data\Repositories\AccLockDateRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccLockDatesTask extends Task
{

    protected $repository;

    public function __construct(AccLockDateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
