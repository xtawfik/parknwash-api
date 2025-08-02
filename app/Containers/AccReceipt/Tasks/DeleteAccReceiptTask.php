<?php

namespace App\Containers\AccReceipt\Tasks;

use App\Containers\AccReceipt\Data\Repositories\AccReceiptRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccReceiptRepository $repository)
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
