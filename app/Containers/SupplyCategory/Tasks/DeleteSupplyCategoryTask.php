<?php

namespace App\Containers\SupplyCategory\Tasks;

use App\Containers\SupplyCategory\Data\Repositories\SupplyCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSupplyCategoryTask extends Task
{

    protected $repository;

    public function __construct(SupplyCategoryRepository $repository)
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
