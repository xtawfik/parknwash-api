<?php

namespace App\Containers\AccItem\Tasks;

use App\Containers\AccItem\Data\Repositories\AccItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccItemTask extends Task
{

    protected $repository;

    public function __construct(AccItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

