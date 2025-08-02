<?php

namespace App\Containers\SupplyInvoice\Tasks;

use App\Containers\SupplyInvoice\Data\Repositories\SupplyInvoiceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSupplyInvoiceTask extends Task
{

    protected $repository;

    public function __construct(SupplyInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

