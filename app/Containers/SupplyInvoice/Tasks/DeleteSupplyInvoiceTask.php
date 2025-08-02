<?php

namespace App\Containers\SupplyInvoice\Tasks;

use App\Containers\SupplyInvoice\Data\Repositories\SupplyInvoiceRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSupplyInvoiceTask extends Task
{

    protected $repository;

    public function __construct(SupplyInvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
