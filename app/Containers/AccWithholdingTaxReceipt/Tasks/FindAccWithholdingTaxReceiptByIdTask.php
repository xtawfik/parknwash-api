<?php

namespace App\Containers\AccWithholdingTaxReceipt\Tasks;

use App\Containers\AccWithholdingTaxReceipt\Data\Repositories\AccWithholdingTaxReceiptRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccWithholdingTaxReceiptByIdTask extends Task
{

    protected $repository;

    public function __construct(AccWithholdingTaxReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
