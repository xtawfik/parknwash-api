<?php

namespace App\Containers\AccSupplier\Tasks;

use App\Containers\AccSupplier\Data\Repositories\AccSupplierRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccSupplierTask extends Task
{

    protected $repository;

    public function __construct(AccSupplierRepository $repository)
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
