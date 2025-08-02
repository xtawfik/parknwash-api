<?php

namespace App\Containers\Park\Tasks;

use App\Containers\Park\Data\Repositories\ParkRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllParksTask extends Task
{

    protected $repository;

    public function __construct(ParkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
