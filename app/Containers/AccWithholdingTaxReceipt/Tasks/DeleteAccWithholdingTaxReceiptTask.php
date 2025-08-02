<?php

namespace App\Containers\AccWithholdingTaxReceipt\Tasks;

use App\Containers\AccWithholdingTaxReceipt\Data\Repositories\AccWithholdingTaxReceiptRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccWithholdingTaxReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccWithholdingTaxReceiptRepository $repository)
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
