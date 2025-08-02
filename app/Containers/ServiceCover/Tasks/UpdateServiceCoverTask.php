<?php

namespace App\Containers\ServiceCover\Tasks;

use App\Containers\ServiceCover\Data\Repositories\ServiceCoverRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateServiceCoverTask extends Task
{

    protected $repository;

    public function __construct(ServiceCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

