<?php

namespace App\Containers\Nationality\Tasks;

use App\Containers\Nationality\Data\Repositories\NationalityRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateNationalityTask extends Task
{

    protected $repository;

    public function __construct(NationalityRepository $repository)
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

