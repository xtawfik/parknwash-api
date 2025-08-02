<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccSpecialAccount\Data\Repositories\AccSpecialAccountRepository;
use App\Ship\Parents\Tasks\Task;

class AccSpecialAccountReportTask extends Task
{

    protected $repository;

    public function __construct(AccSpecialAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
