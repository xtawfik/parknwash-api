<?php

namespace App\Containers\Custody\Tasks;

use App\Containers\Custody\Data\Repositories\CustodyRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCustodyTask extends Task
{

    protected $repository;

    public function __construct(CustodyRepository $repository)
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
