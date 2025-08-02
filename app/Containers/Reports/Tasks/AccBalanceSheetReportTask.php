<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccBalanceSheet\Data\Repositories\AccBalanceSheetRepository;
use App\Ship\Parents\Tasks\Task;

class AccBalanceSheetReportTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
