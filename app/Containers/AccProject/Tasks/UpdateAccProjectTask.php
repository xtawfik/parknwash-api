<?php

namespace App\Containers\AccProject\Tasks;

use App\Containers\AccProject\Data\Repositories\AccProjectRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccProjectTask extends Task
{

    protected $repository;

    public function __construct(AccProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

