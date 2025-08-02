<?php

namespace App\Containers\AccSalesInvoice\Tasks;

use App\Containers\AccSalesInvoice\Data\Repositories\AccSalesInvoiceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccSalesInvoicesTask extends Task
{

    protected $repository;

    public function __construct(AccSalesInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
