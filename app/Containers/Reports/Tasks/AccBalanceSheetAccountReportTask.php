<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccBalanceSheetAccount\Data\Repositories\AccBalanceSheetAccountRepository;
use App\Ship\Parents\Tasks\Task;

class AccBalanceSheetAccountReportTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
