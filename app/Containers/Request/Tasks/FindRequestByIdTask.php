<?php

namespace App\Containers\Request\Tasks;

use App\Containers\Request\Data\Repositories\RequestRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindRequestByIdTask extends Task
{

    protected $repository;

    public function __construct(RequestRepository $repository)
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
