<?php

namespace App\Containers\AccWithholdingTaxReceipt\Tasks;

use App\Containers\AccWithholdingTaxReceipt\Data\Repositories\AccWithholdingTaxReceiptRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccWithholdingTaxReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccWithholdingTaxReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

