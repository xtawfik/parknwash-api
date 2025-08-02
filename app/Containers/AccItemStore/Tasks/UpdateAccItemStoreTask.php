<?php

namespace App\Containers\AccItemStore\Tasks;

use App\Containers\AccItemStore\Data\Repositories\AccItemStoreRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccItemStoreTask extends Task
{

    protected $repository;

    public function __construct(AccItemStoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

