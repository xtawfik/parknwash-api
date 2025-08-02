<?php

namespace App\Containers\Vendor\Tasks;

use App\Containers\Vendor\Data\Repositories\VendorRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateVendorTask extends Task
{

    protected $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

