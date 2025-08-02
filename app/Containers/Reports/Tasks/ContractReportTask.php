<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Contract\Data\Repositories\ContractRepository;
use App\Ship\Parents\Tasks\Task;

class ContractReportTask extends Task
{

    protected $repository;

    public function __construct(ContractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
