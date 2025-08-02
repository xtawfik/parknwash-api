<?php

namespace App\Containers\Option\Tasks;

use App\Containers\Option\Data\Repositories\OptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOptionTask extends Task
{

    protected $repository;

    public function __construct(OptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

