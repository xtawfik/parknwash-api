<?php

namespace App\Containers\ReasonToLeave\Tasks;

use App\Containers\ReasonToLeave\Data\Repositories\ReasonToLeaveRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindReasonToLeaveByIdTask extends Task
{

    protected $repository;

    public function __construct(ReasonToLeaveRepository $repository)
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
