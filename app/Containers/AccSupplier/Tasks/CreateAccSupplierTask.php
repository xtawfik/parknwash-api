<?php

namespace App\Containers\AccSupplier\Tasks;

use App\Containers\AccSupplier\Data\Repositories\AccSupplierRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccSupplierTask extends Task
{

    protected $repository;

    public function __construct(AccSupplierRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

