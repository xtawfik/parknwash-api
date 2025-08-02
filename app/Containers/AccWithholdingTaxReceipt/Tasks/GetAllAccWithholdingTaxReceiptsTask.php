<?php

namespace App\Containers\AccWithholdingTaxReceipt\Tasks;

use App\Containers\AccWithholdingTaxReceipt\Data\Repositories\AccWithholdingTaxReceiptRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccWithholdingTaxReceiptsTask extends Task
{

    protected $repository;

    public function __construct(AccWithholdingTaxReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
