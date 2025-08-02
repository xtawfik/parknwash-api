<?php

namespace App\Containers\JobCard\Tasks;

use App\Containers\JobCard\Data\Repositories\JobCardRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateJobCardTask extends Task
{

    protected $repository;

    public function __construct(JobCardRepository $repository)
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

