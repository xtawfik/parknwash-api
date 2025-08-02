<?php

namespace App\Containers\ProductOption\Tasks;

use App\Containers\ProductOption\Data\Repositories\ProductOptionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllProductOptionsTask extends Task
{

    protected $repository;

    public function __construct(ProductOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
