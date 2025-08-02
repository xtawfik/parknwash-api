<?php

namespace App\Containers\Nationality\Tasks;

use App\Containers\Nationality\Data\Repositories\NationalityRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateNationalityTask extends Task
{

    protected $repository;

    public function __construct(NationalityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

