<?php

namespace App\Containers\AccPurchaseInvoice\Tasks;

use App\Containers\AccPurchaseInvoice\Data\Repositories\AccPurchaseInvoiceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPurchaseInvoiceTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

