<?php

namespace App\Containers\AccHistory\Tasks;

use App\Containers\AccHistory\Data\Repositories\AccHistoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccHistoryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccHistoryRepository $repository)
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
