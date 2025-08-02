<?php

namespace App\Containers\ServiceType\Tasks;

use App\Containers\ServiceType\Data\Repositories\ServiceTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateServiceTypeTask extends Task
{

    protected $repository;

    public function __construct(ServiceTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

