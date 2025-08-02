<?php

namespace App\Containers\ServiceCover\Tasks;

use App\Containers\ServiceCover\Data\Repositories\ServiceCoverRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllServiceCoversTask extends Task
{

    protected $repository;

    public function __construct(ServiceCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
