<?php

namespace App\Containers\ProductOption\Tasks;

use App\Containers\ProductOption\Data\Repositories\ProductOptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateProductOptionTask extends Task
{

    protected $repository;

    public function __construct(ProductOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

