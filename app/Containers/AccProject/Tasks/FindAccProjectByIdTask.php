<?php

namespace App\Containers\AccProject\Tasks;

use App\Containers\AccProject\Data\Repositories\AccProjectRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccProjectByIdTask extends Task
{

    protected $repository;

    public function __construct(AccProjectRepository $repository)
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
