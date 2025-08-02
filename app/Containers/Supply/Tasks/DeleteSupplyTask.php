<?php

namespace App\Containers\Supply\Tasks;

use App\Containers\Supply\Data\Repositories\SupplyRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSupplyTask extends Task
{

    protected $repository;

    public function __construct(SupplyRepository $repository)
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
