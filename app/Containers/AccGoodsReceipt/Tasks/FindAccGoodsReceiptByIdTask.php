<?php

namespace App\Containers\AccGoodsReceipt\Tasks;

use App\Containers\AccGoodsReceipt\Data\Repositories\AccGoodsReceiptRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccGoodsReceiptByIdTask extends Task
{

    protected $repository;

    public function __construct(AccGoodsReceiptRepository $repository)
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
