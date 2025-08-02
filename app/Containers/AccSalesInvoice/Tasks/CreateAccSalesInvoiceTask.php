<?php

namespace App\Containers\AccSalesInvoice\Tasks;

use App\Containers\AccSalesInvoice\Data\Repositories\AccSalesInvoiceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccSalesInvoiceTask extends Task
{

    protected $repository;

    public function __construct(AccSalesInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

