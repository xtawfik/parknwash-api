<?php

namespace App\Containers\ReasonToLeave\Tasks;

use App\Containers\ReasonToLeave\Data\Repositories\ReasonToLeaveRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllReasonToLeavesTask extends Task
{

    protected $repository;

    public function __construct(ReasonToLeaveRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
