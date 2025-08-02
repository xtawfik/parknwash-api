<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccProfitLossAccount\Data\Repositories\AccProfitLossAccountRepository;
use App\Ship\Parents\Tasks\Task;

class AccProfitLossAccountReportTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
