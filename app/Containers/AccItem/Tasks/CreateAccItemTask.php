<?php

namespace App\Containers\AccItem\Tasks;

use App\Containers\AccItem\Data\Repositories\AccItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccItemTask extends Task
{

    protected $repository;

    public function __construct(AccItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

