<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccReceipt\Data\Repositories\AccReceiptRepository;
use App\Ship\Parents\Tasks\Task;

class AccReceiptReportTask extends Task
{

    protected $repository;

    public function __construct(AccReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
