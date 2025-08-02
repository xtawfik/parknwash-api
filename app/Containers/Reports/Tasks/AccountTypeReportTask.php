<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccountType\Data\Repositories\AccountTypeRepository;
use App\Ship\Parents\Tasks\Task;

class AccountTypeReportTask extends Task
{

    protected $repository;

    public function __construct(AccountTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
