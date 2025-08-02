<?php

namespace App\Containers\OrderCover\Tasks;

use App\Containers\OrderCover\Data\Repositories\OrderCoverRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllOrderCoversTask extends Task
{

    protected $repository;

    public function __construct(OrderCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
