<?php

namespace App\Containers\Mall\Tasks;

use App\Containers\Mall\Data\Repositories\MallRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMallsTask extends Task
{

    protected $repository;

    public function __construct(MallRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
