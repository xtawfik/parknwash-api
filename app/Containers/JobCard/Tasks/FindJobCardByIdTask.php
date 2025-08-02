<?php

namespace App\Containers\JobCard\Tasks;

use App\Containers\JobCard\Data\Repositories\JobCardRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindJobCardByIdTask extends Task
{

    protected $repository;

    public function __construct(JobCardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
