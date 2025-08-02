<?php

namespace App\Containers\OrderCover\Tasks;

use App\Containers\OrderCover\Data\Repositories\OrderCoverRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOrderCoverTask extends Task
{

    protected $repository;

    public function __construct(OrderCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

