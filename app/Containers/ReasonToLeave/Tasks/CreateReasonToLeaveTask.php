<?php

namespace App\Containers\ReasonToLeave\Tasks;

use App\Containers\ReasonToLeave\Data\Repositories\ReasonToLeaveRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateReasonToLeaveTask extends Task
{

    protected $repository;

    public function __construct(ReasonToLeaveRepository $repository)
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

