<?php

namespace App\Containers\Receipt\Tasks;

use App\Containers\Receipt\Data\Repositories\ReceiptRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteReceiptTask extends Task
{

    protected $repository;

    public function __construct(ReceiptRepository $repository)
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
