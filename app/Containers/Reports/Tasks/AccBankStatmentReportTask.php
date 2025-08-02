<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccBankStatment\Data\Repositories\AccBankStatmentRepository;
use App\Ship\Parents\Tasks\Task;

class AccBankStatmentReportTask extends Task
{

    protected $repository;

    public function __construct(AccBankStatmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
