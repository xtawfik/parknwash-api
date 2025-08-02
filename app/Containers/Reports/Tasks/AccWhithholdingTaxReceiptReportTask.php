<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccWhithholdingTaxReceipt\Data\Repositories\AccWhithholdingTaxReceiptRepository;
use App\Ship\Parents\Tasks\Task;

class AccWhithholdingTaxReceiptReportTask extends Task
{

    protected $repository;

    public function __construct(AccWhithholdingTaxReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
