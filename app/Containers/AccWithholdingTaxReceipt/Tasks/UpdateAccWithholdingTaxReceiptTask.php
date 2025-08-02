<?php

namespace App\Containers\AccWithholdingTaxReceipt\Tasks;

use App\Containers\AccWithholdingTaxReceipt\Data\Repositories\AccWithholdingTaxReceiptRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccWithholdingTaxReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccWithholdingTaxReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

