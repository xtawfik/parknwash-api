<?php

namespace App\Containers\RequestItem\Tasks;

use App\Containers\RequestItem\Data\Repositories\RequestItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateRequestItemTask extends Task
{

    protected $repository;

    public function __construct(RequestItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

