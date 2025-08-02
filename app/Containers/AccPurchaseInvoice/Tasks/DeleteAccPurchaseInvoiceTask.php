<?php

namespace App\Containers\AccPurchaseInvoice\Tasks;

use App\Containers\AccPurchaseInvoice\Data\Repositories\AccPurchaseInvoiceRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPurchaseInvoiceTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseInvoiceRepository $repository)
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
