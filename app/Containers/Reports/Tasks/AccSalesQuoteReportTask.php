<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccSalesQuote\Data\Repositories\AccSalesQuoteRepository;
use App\Ship\Parents\Tasks\Task;

class AccSalesQuoteReportTask extends Task
{

    protected $repository;

    public function __construct(AccSalesQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
