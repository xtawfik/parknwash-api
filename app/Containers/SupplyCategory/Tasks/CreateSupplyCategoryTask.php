<?php

namespace App\Containers\SupplyCategory\Tasks;

use App\Containers\SupplyCategory\Data\Repositories\SupplyCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSupplyCategoryTask extends Task
{

    protected $repository;

    public function __construct(SupplyCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

