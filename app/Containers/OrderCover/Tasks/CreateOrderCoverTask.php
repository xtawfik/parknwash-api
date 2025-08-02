<?php

namespace App\Containers\OrderCover\Tasks;

use App\Containers\OrderCover\Data\Repositories\OrderCoverRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOrderCoverTask extends Task
{

    protected $repository;

    public function __construct(OrderCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

