<?php

namespace App\Containers\Mall\Tasks;

use App\Containers\Mall\Data\Repositories\MallRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMallTask extends Task
{

    protected $repository;

    public function __construct(MallRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

