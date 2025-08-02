<?php

namespace App\Containers\SupplyInvoice\Tasks;

use App\Containers\SupplyInvoice\Data\Repositories\SupplyInvoiceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSupplyInvoicesTask extends Task
{

    protected $repository;

    public function __construct(SupplyInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
