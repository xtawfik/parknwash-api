<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccGoodsReceipt\Data\Repositories\AccGoodsReceiptRepository;
use App\Ship\Parents\Tasks\Task;

class AccGoodsReceiptReportTask extends Task
{

    protected $repository;

    public function __construct(AccGoodsReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
