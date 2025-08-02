<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccAcountTransfer\Data\Repositories\AccAcountTransferRepository;
use App\Ship\Parents\Tasks\Task;

class AccAcountTransferReportTask extends Task
{

    protected $repository;

    public function __construct(AccAcountTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
