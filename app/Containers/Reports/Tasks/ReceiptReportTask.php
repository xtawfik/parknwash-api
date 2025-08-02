<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Receipt\Data\Repositories\ReceiptRepository;
use App\Ship\Parents\Tasks\Task;

class ReceiptReportTask extends Task
{

    protected $repository;

    public function __construct(ReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
