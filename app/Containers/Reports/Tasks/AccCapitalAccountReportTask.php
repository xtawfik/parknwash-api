<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccCapitalAccount\Data\Repositories\AccCapitalAccountRepository;
use App\Ship\Parents\Tasks\Task;

class AccCapitalAccountReportTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
