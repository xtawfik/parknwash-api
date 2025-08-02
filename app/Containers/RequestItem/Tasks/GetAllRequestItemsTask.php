<?php

namespace App\Containers\RequestItem\Tasks;

use App\Containers\RequestItem\Data\Repositories\RequestItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllRequestItemsTask extends Task
{

    protected $repository;

    public function __construct(RequestItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
