<?php

namespace App\Containers\RequestItem\Tasks;

use App\Containers\RequestItem\Data\Repositories\RequestItemRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteRequestItemTask extends Task
{

    protected $repository;

    public function __construct(RequestItemRepository $repository)
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
