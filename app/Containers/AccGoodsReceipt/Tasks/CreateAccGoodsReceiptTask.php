<?php

namespace App\Containers\AccGoodsReceipt\Tasks;

use App\Containers\AccGoodsReceipt\Data\Repositories\AccGoodsReceiptRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccGoodsReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccGoodsReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

