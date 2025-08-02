<?php

namespace App\Containers\Vendor\Tasks;

use App\Containers\Vendor\Data\Repositories\VendorRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateVendorTask extends Task
{

    protected $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

