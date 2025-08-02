<?php

namespace App\Containers\AccControlType\Tasks;

use App\Containers\AccControlType\Data\Repositories\AccControlTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccControlTypeTask extends Task
{

    protected $repository;

    public function __construct(AccControlTypeRepository $repository)
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

