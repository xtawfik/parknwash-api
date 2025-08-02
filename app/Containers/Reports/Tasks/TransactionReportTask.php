<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Parents\Tasks\Task;

class TransactionReportTask extends Task
{

    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
