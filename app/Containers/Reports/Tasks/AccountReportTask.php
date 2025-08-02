<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Account\Data\Repositories\AccountRepository;
use App\Ship\Parents\Tasks\Task;

class AccountReportTask extends Task
{

    protected $repository;

    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
