<?php

namespace App\Containers\ReasonToLeave\Tasks;

use App\Containers\ReasonToLeave\Data\Repositories\ReasonToLeaveRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateReasonToLeaveTask extends Task
{

    protected $repository;

    public function __construct(ReasonToLeaveRepository $repository)
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

