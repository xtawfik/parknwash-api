<?php

namespace App\Containers\AccProject\Tasks;

use App\Containers\AccProject\Data\Repositories\AccProjectRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccProjectsTask extends Task
{

    protected $repository;

    public function __construct(AccProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
