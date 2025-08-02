<?php

namespace App\Containers\JobCard\Tasks;

use App\Containers\JobCard\Data\Repositories\JobCardRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteJobCardTask extends Task
{

    protected $repository;

    public function __construct(JobCardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
