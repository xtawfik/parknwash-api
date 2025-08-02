<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\SupplyInvoice\Data\Repositories\SupplyInvoiceRepository;
use App\Ship\Parents\Tasks\Task;

class SupplyInvoiceReportTask extends Task
{

    protected $repository;

    public function __construct(SupplyInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
