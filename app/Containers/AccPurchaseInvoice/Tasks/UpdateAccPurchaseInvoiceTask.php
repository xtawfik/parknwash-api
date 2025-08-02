<?php

namespace App\Containers\AccPurchaseInvoice\Tasks;

use App\Containers\AccPurchaseInvoice\Data\Repositories\AccPurchaseInvoiceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPurchaseInvoiceTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

