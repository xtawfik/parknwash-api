<?php

namespace App\Containers\AccReceipt\Tasks;

use App\Containers\AccReceipt\Data\Repositories\AccReceiptRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccReceiptsTask extends Task
{

    protected $repository;

    public function __construct(AccReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
