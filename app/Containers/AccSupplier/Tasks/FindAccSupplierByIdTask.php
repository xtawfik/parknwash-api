<?php

namespace App\Containers\AccSupplier\Tasks;

use App\Containers\AccSupplier\Data\Repositories\AccSupplierRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccSupplierByIdTask extends Task
{

    protected $repository;

    public function __construct(AccSupplierRepository $repository)
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
