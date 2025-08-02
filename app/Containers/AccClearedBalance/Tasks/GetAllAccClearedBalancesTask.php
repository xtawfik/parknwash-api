<?php

namespace App\Containers\AccClearedBalance\Tasks;

use App\Containers\AccClearedBalance\Data\Repositories\AccClearedBalanceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccClearedBalancesTask extends Task
{

    protected $repository;

    public function __construct(AccClearedBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
