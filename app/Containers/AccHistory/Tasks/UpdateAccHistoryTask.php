<?php

namespace App\Containers\AccHistory\Tasks;

use App\Containers\AccHistory\Data\Repositories\AccHistoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccHistoryTask extends Task
{

    protected $repository;

    public function __construct(AccHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

