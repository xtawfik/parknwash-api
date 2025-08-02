<?php

namespace App\Containers\AccHistory\Tasks;

use App\Containers\AccHistory\Data\Repositories\AccHistoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccHistoryTask extends Task
{

    protected $repository;

    public function __construct(AccHistoryRepository $repository)
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
