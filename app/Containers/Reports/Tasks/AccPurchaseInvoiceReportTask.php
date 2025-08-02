<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccPurchaseInvoice\Data\Repositories\AccPurchaseInvoiceRepository;
use App\Ship\Parents\Tasks\Task;

class AccPurchaseInvoiceReportTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
