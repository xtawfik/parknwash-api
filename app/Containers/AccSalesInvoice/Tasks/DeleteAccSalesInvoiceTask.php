<?php

namespace App\Containers\AccSalesInvoice\Tasks;

use App\Containers\AccSalesInvoice\Data\Repositories\AccSalesInvoiceRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccSalesInvoiceTask extends Task
{

    protected $repository;

    public function __construct(AccSalesInvoiceRepository $repository)
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
