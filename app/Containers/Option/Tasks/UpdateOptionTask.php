<?php

namespace App\Containers\Option\Tasks;

use App\Containers\Option\Data\Repositories\OptionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOptionTask extends Task
{

    protected $repository;

    public function __construct(OptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

