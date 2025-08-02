<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccClearedBalance\Data\Repositories\AccClearedBalanceRepository;
use App\Ship\Parents\Tasks\Task;

class AccClearedBalanceReportTask extends Task
{

    protected $repository;

    public function __construct(AccClearedBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
