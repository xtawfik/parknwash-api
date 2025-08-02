<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccCurrency\Data\Repositories\AccCurrencyRepository;
use App\Ship\Parents\Tasks\Task;

class AccCurrencyReportTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
