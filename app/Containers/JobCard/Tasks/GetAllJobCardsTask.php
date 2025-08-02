<?php

namespace App\Containers\JobCard\Tasks;

use App\Containers\JobCard\Data\Repositories\JobCardRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllJobCardsTask extends Task
{

    protected $repository;

    public function __construct(JobCardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
