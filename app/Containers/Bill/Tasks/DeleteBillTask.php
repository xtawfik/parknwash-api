<?php

namespace App\Containers\Bill\Tasks;

use App\Containers\Bill\Data\Repositories\BillRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteBillTask extends Task
{

    protected $repository;

    public function __construct(BillRepository $repository)
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
