<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccProfitLoss\Data\Repositories\AccProfitLossRepository;
use App\Ship\Parents\Tasks\Task;

class AccProfitLossReportTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
