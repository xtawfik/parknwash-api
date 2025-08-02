<?php

namespace App\Containers\AccBalanceSheet\Tasks;

use App\Containers\AccBalanceSheet\Data\Repositories\AccBalanceSheetRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccBalanceSheetsTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
