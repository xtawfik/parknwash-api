<?php

namespace App\Containers\JobDescription\Tasks;

use App\Containers\JobDescription\Data\Repositories\JobDescriptionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateJobDescriptionTask extends Task
{

    protected $repository;

    public function __construct(JobDescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

