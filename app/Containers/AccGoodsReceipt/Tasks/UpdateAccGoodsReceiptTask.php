<?php

namespace App\Containers\AccGoodsReceipt\Tasks;

use App\Containers\AccGoodsReceipt\Data\Repositories\AccGoodsReceiptRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccGoodsReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccGoodsReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

