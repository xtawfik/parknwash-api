<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPurchaseQuote\Data\Repositories\AccPurchaseQuoteRepository;
use App\Ship\Parents\Tasks\Task;

class AccPurchaseQuoteReportTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
