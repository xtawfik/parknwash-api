<?php

namespace App\Containers\JobDescription\Tasks;

use App\Containers\JobDescription\Data\Repositories\JobDescriptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateJobDescriptionTask extends Task
{

    protected $repository;

    public function __construct(JobDescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

