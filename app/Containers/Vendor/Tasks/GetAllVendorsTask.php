<?php

namespace App\Containers\Vendor\Tasks;

use App\Containers\Vendor\Data\Repositories\VendorRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllVendorsTask extends Task
{

    protected $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
