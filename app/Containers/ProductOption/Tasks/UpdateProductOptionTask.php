<?php

namespace App\Containers\ProductOption\Tasks;

use App\Containers\ProductOption\Data\Repositories\ProductOptionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateProductOptionTask extends Task
{

    protected $repository;

    public function __construct(ProductOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

