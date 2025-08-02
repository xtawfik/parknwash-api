<?php

namespace App\Containers\ProductOption\Tasks;

use App\Containers\ProductOption\Data\Repositories\ProductOptionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindProductOptionByIdTask extends Task
{

    protected $repository;

    public function __construct(ProductOptionRepository $repository)
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
