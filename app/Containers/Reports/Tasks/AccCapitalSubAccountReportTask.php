<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccCapitalSubAccount\Data\Repositories\AccCapitalSubAccountRepository;
use App\Ship\Parents\Tasks\Task;

class AccCapitalSubAccountReportTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalSubAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
