<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccBankStatement\Data\Repositories\AccBankStatementRepository;
use App\Ship\Parents\Tasks\Task;

class AccBankStatementReportTask extends Task
{

    protected $repository;

    public function __construct(AccBankStatementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
